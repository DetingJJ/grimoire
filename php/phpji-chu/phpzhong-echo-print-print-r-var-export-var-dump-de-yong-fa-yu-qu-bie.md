1.分析各个语句/函数的功能，概要一下各个的类型

2.总结他们的区别

php中可以输出变量内容的语句或者函数有：

,print,print\_r,var\_export,var\_dump 

|key|类型|功能|
|--|--|--|
|echo|PHP语句|echo 输出一个或者多个字符串或变量值|
|print|PHP语句|用于输出一个或多个字符串或变量值的信息|
|print_r|函数|用于打印关于变量易于理解的信息|
|var_export|函数|返回关于传递给该函数的变量的结构信息|
|var_dump|函数|函数用于显示关于一个或多个表达式的结构信息，包括表达式的类型与值|


echo 输出一个或者多个字符串或变量值，他是php语句，不是函数。因为他不是函数，所以他也是没有返回值的。

例如：

```
echo $str,'world','hello！';

echo $str;
```

引文：[http://www.phpernote.com/php-function/689.html](http://www.phpernote.com/php-function/689.html)

