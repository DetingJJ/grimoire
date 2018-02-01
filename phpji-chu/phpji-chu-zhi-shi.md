4. 闭包

5. 预定义数组

7.正则表达式

邮箱：

网址：

标签匹配：

正则函数：

[http://blog.csdn.net/zuiaituantuan/article/details/5881259](http://blog.csdn.net/zuiaituantuan/article/details/5881259)

preg\_match\(\);

preg\_match\_all\(\);

  


  


8. 异常处理

PHP异常处理：

[http://www.w3school.com.cn/php/php\_exception.asp](http://www.w3school.com.cn/php/php_exception.asp)

[PHP中的错误处理、异常处理机制：http://www.cnblogs.com/cnbeir/archive/2012/05/05/2484635.html](http://www.cnblogs.com/cnbeir/archive/2012/05/05/2484635.html)

  


9. php事件函数

 echo date\('Y-m-d H:i:s'\);

  


 $intTime = time\(\);

 echo date\('Y-m-d H:i:s',$intTime\);

  


echo\(date\("M-d-Y",mktime\(0,0,0,12,3,2001\)\)\);

  


echo\(date\('y-m-d H:i:s', strtotime\('+1 day'\)\)\);

  


10. 文件系统

$ret = file\_put\_contents\($file, $content, FILE\_APPEND\);

$content = file\_get\_contents\($file\);

  


文件上传：

$\_FILES保存上传到服务端的文件。

文件扩展名

pathinfo

\(

$file

, PATHINFO\_EXTENSION\);

$fileInfo =

 pathinfo\($file\);

  


array\(4\) {

 \["dirname"\]=

&gt;

 string\(1\) "."

 \["basename"\]=

&gt;

 string\(10\) "a.b.tar.gz"

 \["extension"\]=

&gt;

 string\(2\) "gz"

 \["filename"\]=

&gt;

 string\(7\) "a.b.tar"

}

  


函数引用：

函数的引用返回

先看代码1 2··qA

\[php\]

function 

&

test\(\)

{

static $b=0;//申明一个静态变量

$b=$b+1;

echo $b;

return $b;

}

  


$a=test\(\);//这条语句会输出　$b的值　为１

$a=5;

$a=test\(\);//这条语句会输出　$b的值　为2

  


$a=

&

test\(\);//这条语句会输出　$b的值　为3

$a=5;

$a=test\(\);//这条语句会输出　$b的值　为6

\[/php\]

下面解释下：　

通过这种方式$a=test\(\);得到的其实不是函数的引用返回，这跟普通的函数调用没有区别　至于原因：　这是ＰＨＰ的规定

ＰＨＰ规定通过$a=

&

test\(\); 方式得到的才是函数的引用返回

至于什么是引用返回呢（ＰＨＰ手册上说：引用返回用在当想用函数找到引用应该被绑定在哪一个变量上面时。\) 这句狗屁话　害我半天没看懂

  


用上面的例子来解释就是

$a=test\(\)方式调用函数，只是将函数的值赋给$a而已，　而$a做任何改变　都不会影响到函数中的$b

而通过$a=

&

test\(\)方式调用函数呢, 他的作用是　将return $b中的　$b变量的内存地址与$a变量的内存地址　指向了同一个地方

即产生了相当于这样的效果\($a=

&

b;\) 所以改变$a的值　也同时改变了$b的值　所以在执行了

$a=

&

test\(\);

$a=5;

以后，$b的值变为了5

  


11。会话控制

[http://www.cnblogs.com/zhenyu-whu/archive/2012/11/21/2780312.html](http://www.cnblogs.com/zhenyu-whu/archive/2012/11/21/2780312.html)

[http://www.jb51.net/article/55703.htm](http://www.jb51.net/article/55703.htm)

下面开始实际介绍PHP的会话功能。

　　使用会话的基本步骤如下：

　　1）开始一个会话

　　　　调用session\_start\(\)函数即可，函数的具体功能可以查阅PHP的文档。需要注意的是，必须在使用会话的脚本开始部分调用这个函数，如果没有，所有保存在该会话中的信息都无法在脚本中使用。除了手动调用session\_start\(\)函数外，也可以自动配置PHP自动调用，可以Google之。

　　2）注册一个会话变量

　　　　从PHP4.1以后，会话变量保存在超级全局数组$\_SESSION中。要创建一会话变量，只需要在数组中设置一个元素，如$\_SESSION\['myvar'\] = 5;

　　3\) 使用一个会话变量

　　　　要使用一个会话变量很简单，使用$\_SESSION数组访问保存的会话变量即可，如 echo $\_SESSION\['mywar'\]; 会打印出 5。使用会话前必须首先使用session\_start\(\)函数启动一个会话。

　　4）注销变量和销毁会话

　　　　注销变量直接使用unset即可，如unset\($\_SESSION\['myvar'\]\)，如何要一次销毁所有会话变量，可以使用 unset\($\_SESSION\); 当使用完一个会话后，首先应该注销所有的变量，然后再调用session\_destroy\(\) 来清除会话ID。

  


15。字符串转义

addslashes\(\);

stripslashes\(\);

  


htmlspecialchars\(\);

htmlspecialchars\_decode\(\);

  


17.网络状态码含义

网络状态码含义，常用（204，304, 404, 504，502）

204：

No Content

服务器成功处理了请求，但不需要返回任何实体内容，并且希望返回更新了的元信息。

304

：

Not Modified

404：

Not Found

504：

Gateway Timeout

502：

Bad Gateway

500：Internal Server Error

  


18。PHP配置文件 含义

[http://blog.csdn.net/chengxuyuanyonghu/article/details/51320794](http://blog.csdn.net/chengxuyuanyonghu/article/details/51320794)

  


19。url处理函数，得到URL部分

urldecode\(\);

urlencode\(\);

$test = pathinfo\("http://localhost/index.php"\);

print\_r\($test\);

Array

\(

 \[dirname\] =

&gt;

 http://localhost

 \[basename\] =

&gt;

 index.php

 \[extension\] =

&gt;

 php

 \[filename\] =

&gt;

 index

\)

  


$test = parse\_url\("http://localhost/index.php?name=tank

&

sex=1\#top"\);

print\_r\($test\);

Array

\(

 \[scheme\] =

&gt;

 http

 \[host\] =

&gt;

 localhost

 \[path\] =

&gt;

 /index.php

 \[query\] =

&gt;

 name=tank

&

sex=1

 \[fragment\] =

&gt;

 top

\)

  


  


$test = basename\("http://localhost/index.php?name=tank

&

sex=1\#top"\);

echo $test;

index.php?name=tank

&

sex=1\#top

  


  


  


  


  


  


  


