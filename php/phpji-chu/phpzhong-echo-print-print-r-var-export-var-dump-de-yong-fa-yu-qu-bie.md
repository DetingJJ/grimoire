1.分析各个语句/函数的功能，概要一下各个的类型

2.总结他们的区别

php中可以输出变量内容的语句或者函数有：

,print,print\_r,var\_export,var\_dump

## 功能/区别【概要】

| key | 类型 | 功能 |
| --- | --- | --- |
| echo | PHP语句 | echo 输出一个或者多个字符串或变量值 |
| print | PHP语句 | 用于输出一个或多个字符串或变量值的信息 |
| print\_r | 函数 | 用于打印关于变量易于理解的信息 |
| var\_export | 函数 | 返回关于传递给该函数的变量的结构信息 |
| var\_dump | 函数 | 函数用于显示关于一个或多个表达式的结构信息，包括表达式的类型与值 |

## 功能详解

### echo

echo 输出一个或者多个字符串或变量值，他是php语句，不是函数。因为他不是函数，所以他也是没有返回值的。

```php
echo $str,'world','hello！';
echo $str;
```

### print

print print\(\)用于输出一个或多个字符串或变量值的信息。它只能打印出简单类型变量的值\(如int,string\)，不能打印数组和对象。他本质上也是一个语言结构而非函数，因此它无法被“变量函数”调用。print有返回值并且总是1。

> 注释：print\(\) 稍慢于 echo\(\)。

### print\_r

print\_r print\_r\(\)是函数，用于打印关于变量的易于理解的信息。

print\_r 函数原型：`bool print_r ( mixed expression [, bool return] )`

由上可见print\_r返回值是布尔型的,参数是mix类型的,可以是字符串,整形,数组,对象类print\_r\(\) 显示关于一个变量的易于理解的信息。如果给出的是 string、integer 或 float，将打印变量值本身。如果给出的是 array，将会按照一定格式显示键和元素。object 与数组类似。

注释: 参数 return 是在 PHP 4.3.0 的时候加上的。记住，print\_r\(\) 对数组作用后将把数组的指针移到最后边。使用 reset\(\) 可让指针回到开始处。

如果想捕捉 print\_r\(\) 的输出，可使用 return 参数。若此参数设为 TRUE， print\_r\(\) 将不打印结果（此为默认动作），而是返回其输出。例如：

```php
<?php
$b = array ('m' => 'monkey', 'foo' => 'bar', 'x' => array ('x', 'y', 'z'));
$results = print_r ($b, true); //$results 包含了 print_r 的输出结果
```

例如：

```php
echo $str,'world','hello！';

echo $str;
```

引文：[http://www.phpernote.com/php-function/689.html](http://www.phpernote.com/php-function/689.html)

