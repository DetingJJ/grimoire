integer是集合 ? = {..., -2, -1, 0, 1, 2, ...} 中的某个数。

整型数的字长和平台有关，尽管通常最大值是大约二十亿（32 位有符号）。64 位平台下的最大值通常是大约 9E18，除了 Windows 下 PHP 7 以前的版本，总是 32 位的。 PHP 不支持无符号的 [integer](itss://chm/res/language.types.integer.html)。[Integer](itss://chm/res/language.types.integer.html) 值的字长可以用常量**PHP\_INT\_SIZE**来表示，自 PHP 4.4.0 和 PHP 5.0.5后，最大值可以用常量**PHP\_INT\_MAX**来表示，最小值可以在 PHP 7.0.0 及以后的版本中用常量**PHP\_INT\_MIN**表示。

> 整型值可以使用十进制，十六进制，八进制或二进制表示，前面可以加上可选的符号（- 或者 +）
>
> e二进制表达的 [integer](itss://chm/res/language.types.integer.html) 自 PHP 5.4.0 起可用。
>
> 要使用八进制表达，数字前必须加上 0（零）。要使用十六进制表达，数字前必须加上 0x。要使用二进制表达，数字前必须加上 0b。

**举个栗子：**

```php
$a = 1234; // 十进制数
$a = -123; // 负数
$a = 0123; // 八进制数 (等于十进制 83)
$a = 0x1A; // 十六进制数 (等于十进制 26)
$a = 0b11111111; // 二进制数字 (等于十进制 255)
```

**语法形式：**

```
decimal     : [1-9][0-9]*
            | 0

hexadecimal : 0[xX][0-9a-fA-F]+

octal       : 0[0-7]+

binary      : 0b[01]+

integer     : [+-]?decimal
            | [+-]?hexadecimal
            | [+-]?octal
            | [+-]?binary
```



