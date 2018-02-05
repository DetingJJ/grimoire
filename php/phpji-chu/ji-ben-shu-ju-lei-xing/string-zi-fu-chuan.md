一个字符串 string 就是由一系列的字符组成，其中每个字符等同于一个字节。这意味着 PHP 只能支持 256 的字符集，因此不支持 Unicode 。

> string最大可以达到 2GB。

# 语法

**一个字符串可以用4种表达方式：**

* 单引号
* 双引号
* heredoc语法结构
* nowdoc语法结构（自PHP5.3.0起）

## **单引号：**

> 不像双引号和 heredoc 语法结构，在单引号字符串中的变量和特殊字符的转义序列将不会被替换

**举个栗子：**

```php
echo 'this is a simple string';

// 可以录入多行
echo 'You can also have embedded newlines in 
strings this way as it is
okay to do';

// 输出： Arnold once said: "I'll be back"
echo 'Arnold once said: "I\'ll be back"';

// 输出： You deleted C:\*.*?
echo 'You deleted C:\\*.*?';

// 输出： You deleted C:\*.*?
echo 'You deleted C:\*.*?';

// 输出： This will not expand: \n a newline
echo 'This will not expand: \n a newline';

// 输出： Variables do not $expand $either
echo 'Variables do not $expand $either';
```

## 双引号

如果字符串是包围在双引号（"）中， PHP 将对一些特殊的字符进行解析

**转义字符**

| **序列** | **含义** |
| :--- | :--- |
| \n | 换行（ASCII 字符集中的 LF 或 0x0A \(10\)） |
| \r | 回车（ASCII 字符集中的 CR 或 0x0D \(13\)） |
| \t | 水平制表符（ASCII 字符集中的 HT 或 0x09 \(9\)） |
| \v | 垂直制表符（ASCII 字符集中的 VT 或 0x0B \(11\)）（自 PHP 5.2.5 起） |
| \e | Escape（ASCII 字符集中的 ESC 或 0x1B \(27\)）（自 PHP 5.4.0 起） |
| \f | 换页（ASCII 字符集中的 FF 或 0x0C \(12\)）（自 PHP 5.2.5 起） |
| \ | 反斜线 |
| $ | 美元标记 |
| \" | 双引号 |
| \\[0-7\]{1,3} | 符合该正则表达式序列的是一个以八进制方式来表达的字符 |
| \x\[0-9A-Fa-f\]{1,2} | 符合该正则表达式序列的是一个以十六进制方式来表达的字符 |

> 和单引号字符串一样，转义任何其它字符都会导致反斜线被显示出来。  
> 用双引号定义的字符串最重要的特征是变量会被解析。

## **Heredoc 结构**

第三种表达字符串的方法是用 heredoc 句法结构：&lt;&lt;&lt;。在该运算符之后要提供一个标识符，然后换行。接下来是字符串 string 本身，最后要用前面定义的标识符作为结束标志。

结束时所引用的标识符必须在该行的第一列，而且，标识符的命名也要像其它标签一样遵守 PHP 的规则：只能包含字母、数字和下划线，并且必须以字母和下划线作为开头。

**举个栗子1：**

```
class foo {
    public $bar = <<<EOT
bar
    EOT;
}
```

> Heredoc 结构就象是没有使用双引号的双引号字符串，这就是说在 heredoc 结构中单引号不用被转义，但是上文中列出的转义序列还可以使用。变量将被替换，但在 heredoc 结构中含有复杂的变量时要格外小心。

**举个栗子2：**

```php
$str = <<<EOD
Example of string
spanning multiple lines
using heredoc syntax.
EOD;

/* 含有变量的更复杂示例 */
class foo
{
    var $foo;
    var $bar;

    function foo()
    {
        $this->foo = 'Foo';
        $this->bar = array('Bar1', 'Bar2', 'Bar3');
    }
}

$foo = new foo();
$name = 'MyName';

echo <<<EOT
My name is "$name". I am printing some $foo->foo.
Now, I am printing some {$foo->bar[1]}.
This should print a capital 'A': \x41
EOT;
```

**以上例程会输出：**

```
My name is "MyName". I am printing some Foo.
Now, I am printing some Bar2.
This should print a capital 'A': A
```

## Now**doc 结构**

```php
$str = <<<'EOD'
Example of string
spanning multiple lines
using nowdoc syntax.
EOD;

/* 含有变量的更复杂的示例 */
class foo
{
    public $foo;
    public $bar;

    function foo()
    {
        $this->foo = 'Foo';
        $this->bar = array('Bar1', 'Bar2', 'Bar3');
    }
}

$foo = new foo();
$name = 'MyName';

echo <<<'EOT'
My name is "$name". I am printing some $foo->foo.
Now, I am printing some {$foo->bar[1]}.
This should not print a capital 'A': \x41
EOT;
```

**以上例程会输出：**

```
My name is "$name". I am printing some $foo->foo.
Now, I am printing some {$foo->bar[1]}.
This should not print a capital 'A': \x41
```

# **字符串类型详解**

PHP 中的 string 的实现方式是一个由字节组成的数组再加上一个整数指明缓冲区长度。并无如何将字节转换成字符的信息，由程序员来决定。字符串由什么值来组成并无限制；特别的，其值为 0（"NUL bytes"）的字节可以处于字符串任何位置（不过有几个函数，在本手册中被称为非"二进制安全"的，也许会把 NUL 字节之后的数据全都忽略）。

字符串类型的此特性解释了为什么 PHP 中没有单独的"byte"类型 - 已经用字符串来代替了。返回非文本值的函数 - 例如从网络套接字读取的任意数据 - 仍会返回字符串。

由于 PHP 并不特别指明字符串的编码，那字符串到底是怎样编码的呢？例如字符串 "á" 到底是等于 "\xE1"（ISO-8859-1），"\xC3\xA1"（UTF-8，C form），"\x61\xCC\x81"（UTF-8，D form）还是任何其它可能的表达呢？答案是字符串会被按照该脚本文件相同的编码方式来编码。因此如果一个脚本的编码是 ISO-8859-1，则其中的字符串也会被编码为 ISO-8859-1，以此类推。不过这并不适用于激活了 Zend Multibyte 时；此时脚本可以是以任何方式编码的（明确指定或被自动检测）然后被转换为某种内部编码，然后字符串将被用此方式编码。注意脚本的编码有一些约束（如果激活了 Zend Multibyte 则是其内部编码）- 这意味着此编码应该是 ASCII 的兼容超集，例如 UTF-8 或 ISO-8859-1。不过要注意，依赖状态的编码其中相同的字节值可以用于首字母和非首字母而转换状态，这可能会造成问题。

当然了，要做到有用，操作文本的函数必须假定字符串是如何编码的。不幸的是，PHP 关于此的函数有很多变种：

* 某些函数假定字符串是以单字节编码的，但并不需要将字节解释为特定的字符。例如 [substr\(\)](itss://chm/res/function.substr.html)，[strpos\(\)](itss://chm/res/function.strpos.html)，[strlen\(\)](itss://chm/res/function.strlen.html) 和 [strcmp\(\)](itss://chm/res/function.strcmp.html)。理解这些函数的另一种方法是它们作用于内存缓冲区，即按照字节和字节下标操作。

* 某些函数被传递入了字符串的编码方式，也可能会假定默认无此信息。例如 [htmlentities\(\)](itss://chm/res/function.htmlentities.html) 和 [mbstring](itss://chm/res/book.mbstring.html) 扩展中的大部分函数。

* 其它函数使用了当前区域（见 [setlocale\(\)](itss://chm/res/function.setlocale.html)），但是逐字节操作。例如 [strcasecmp\(\)](itss://chm/res/function.strcasecmp.html)，[strtoupper\(\)](itss://chm/res/function.strtoupper.html) 和 [ucfirst\(\)](itss://chm/res/function.ucfirst.html)。这意味着这些函数只能用于单字节编码，而且编码要与区域匹配。例如 strtoupper\("á"\) 在区域设定正确并且 á 是单字节编码时会返回 "á"。如果是用 UTF-8 编码则不会返回正确结果，其结果根据当前区域有可能返回损坏的值。

* 后一些函数会假定字符串是使用某特定编码的，通常是 UTF-8。[intl](itss://chm/res/book.intl.html) 扩展和 [PCRE](itss://chm/res/book.pcre.html)（上例中仅在使用了 u 修饰符时）扩展中的大部分函数都是这样。尽管这是由于其特殊用途，[utf8\_decode\(\)](itss://chm/res/function.utf8-decode.html) 会假定 UTF-8 编码而 [utf8\_encode\(\)](itss://chm/res/function.utf8-encode.html) 会假定 ISO-8859-1 编码。



