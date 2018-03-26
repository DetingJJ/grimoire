## mysql全文索引fulltext及实例剖析

### mysql全文索引使用条件

首页要先明白mysql的全文检索原理：mysql使用的是一个非常简单的剖析器来将文本分隔成词，空格、标点等，比如‘welcom to you’将分隔为三个词‘welcom’、‘to’、‘you’，但是对中文来说，比如‘人力方网站正式上线’，这将无法分隔，因此目前mysql只支持 英文的全文检索。

mysql全文索引使用条件有两个，一个是对表存储引擎类型的要求，二是对设置全文索引字段的类型的要求。

1. 表的存储引擎是MyISAM，默认存储引擎InnoDB不支持全文索引（新版本MYSQL5.6的InnoDB支持全文索引）
2. 字段类型：只有字段类型为char、varchar和text的字段才能设置全文索引。

## mysql如何创建全文索引

全文索引可以在创建表的时候设置，也可以在已有的表中进行设置。

1.创建表时设置全文索引，具体代码如下：

    CREATE TABLE IF NOT EXISTS `category` (      
      `id` int(10) NOT NULL auto_increment,      
      `fid` int(10) NOT NULL,      
      `catname` char(255) NOT NULL,      
      `addtime` char(10) NOT NULL,      
      PRIMARY KEY  (`id`),      
      FULLTEXT KEY `catname` (`catname`)      
    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ; 

从上面代码可以看出，设置某字段为全文索引的SQL代码为FULLTEXT KEY \`catname\` \(\`catname\`\)

2.再已有的表中为某字段设置全文索引：

```
ALTER TABLE <table> ADD FULLTEXT (fields)
```

或者直接在myphpadmin控制台中点击结尾处的{全文搜索}即可设置全文索引，不同MYSQL版本名字可能不同。

## mysql全文索引的基本语法

全文索引搜索语法

```
MATCH (列名1, 列名2,…) AGAINST (搜索字符串 [搜索修饰符])
```

其中在match里面指定的列名1、2等，就是在建立全文索引中指定的列名， 后面的搜索修饰符说明如下：

```
search_modifier:
{
IN NATURAL LANGUAGE MODE
| IN NATURAL LANGUAGE MODE WITH QUERY EXPANSION
| IN BOOLEAN MODE
| WITH QUERY EXPANSION
}
```

如：

```
SELECT * FROM tableName WHERE MATCH(fields) AGAINST ('search term')
```

## mysql全文索引实例

首页我们建立表与初始化数据

    CREATE TABLE IF NOT EXISTS `category` (      
      `id` int(10) NOT NULL auto_increment,      
      `fid` int(10) NOT NULL,      
      `catname` char(255) NOT NULL,      
      `addtime` char(10) NOT NULL,      
      PRIMARY KEY  (`id`),      
      FULLTEXT KEY `catname` (`catname`)      
    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;      

    /*  http://www.manongjc.com/article/1443.html */    
    INSERT INTO `category` (`id`, `fid`, `catname`, `addtime`) VALUES     
    (1, 0, 'welcome to you!', '1263363380'),      
    (2, 0, 'hello phpjs,you are welcome', '1263363416'),      
    (3, 0, 'this is the fan site of you', '1263363673');

在具体实例之前，我们分析下msyql全文检索的语法：函数 MATCH\(\) 对照一个文本集\(包含在一个 FULLTEXT 索引中的一个或多个列的列集\)执行一个自然语言搜索一个字符串。搜索字符串做为 AGAINST\(\) 的参数被给定。搜索以忽略字母大小写的方式执行。说白了就是MATCH给定匹配的列（fulltext类型索引），AGAINST给定要匹配的字符串，多 个用空格、标点分开，mysql会自动分隔。

操作一：

    SELECT * FROM `category` WHERE MATCH(catname) AGAINST('phpjs')    

返回结果：

| id | fid | catname | addtime |
| :--- | :--- | :--- | :--- |
| 2 | 0 | hello phpjs,you are welcome | 1263363416 |

匹配出了含有phpjs关键字的行数据。

操作二：

    SELECT * FROM `category` WHERE MATCH (catname) AGAINST ('this')  

按照上面的思路，第三行数据含有this，因此应该可以匹配出第三行数据的，但事实却奇怪得很，返回结果为空，为什么呢？

原来是mysql指定了最小字符长度，默认是4，必须要匹配大于4的才会有返回结果，可以用 `SHOW VARIABLES LIKE 'ft_min_word_len'` 来查看指定的字符长度，也可以在mysql配置文件my.ini 更改最小字符长度，方法是在my.ini 增加一行 比如：ft\_min\_word\_len = 2，改完后重启mysql即可。

操作三：

这里我们要确定把最小字符改为2了，因为3行记录都有‘you’，因此心想，匹配‘you’就可以返回所有结果了

    SELECT * FROM `category` WHERE MATCH (catname) AGAINST ('you') 

返回结果还是为空，大跌眼镜了吧，这又是为什么呢？

原来mysql在集和查询中的对每个合适的词都会先计算它们的权重，一个出现在多个文档中的词将有较低的权重\(可能甚至有一个零权重\)，因为在这个 特定的集中，它有较低的语义值。否则，如果词是较少的，它将得到一个较高的权重，mysql默认的阀值是50%，上面‘you’在每个文档都出现，因此是 100%，只有低于50%的才会出现在结果集中。

操作四：

有人会想，我不去管权重大小，只要有匹配的就给我返回结果集中，那么该如何做呢？

mysql到 4.0.1 时，可以使用 `IN BOOLEAN MODE` 修饰语来执行一个逻辑全文搜索

    SELECT * FROM `category` WHERE MATCH(catname) AGAINST('you' IN BOOLEAN MODE) 

总结：

1. 要注意最小字符的长度；
2. 要注意关键词的权重；



