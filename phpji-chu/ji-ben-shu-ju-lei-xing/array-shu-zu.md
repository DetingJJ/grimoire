PHP 中的数组实际上是一个有序映射。映射是一种把 values 关联到 keys 的类型。此类型在很多方面做了优化，因此可以把它当成真正的数组，或列表（向量），散列表（是映射的一种实现），字典，集合，栈，队列以及更多可能性。由于数组元素的值也可以是另一个数组，树形结构和多维数组也是允许的。

# **语法**

**定义数组**[**array\(\)**](itss://chm/res/function.array.html)

可以用 [array\(\)](itss://chm/res/function.array.html) 语言结构来新建一个数组。它接受任意数量用逗号分隔的 键（key） =&gt; 值（value）对。

array\( key =&gt; value

, ...

\)

// 键（key）可是是一个整数 [integer](itss://chm/res/language.types.integer.html) 或字符串 [string](itss://chm/res/language.types.string.html)

// 值（value）可以是任意类型的值

最后一个数组单元之后的逗号可以省略。通常用于单行数组定义中，例如常用 array\(1, 2\) 而不是 array\(1, 2, \)。对多行数组定义通常保留最后一个逗号，这样要添加一个新单元时更方便。

自 5.4 起可以使用短数组定义语法，用 \[\] 替代 array\(\)。

**举个栗子：**

```php
$array = array(
    "foo" => "bar",
    "bar" => "foo",
);

// 自 PHP 5.4 起
$array = [
    "foo" => "bar",
    "bar" => "foo",
];
```

> key 可以是 [integer](itss://chm/res/language.types.integer.html) 或者 [string](itss://chm/res/language.types.string.html)。value 可以是任意类型。

**此外 key 会有如下的强制转换：**

* 包含有合法整型值的字符串会被转换为整型。例如键名 "8" 实际会被储存为 8。但是 "08" 则不会强制转换，因为其不是一个合法的十进制数值。
* 浮点数也会被转换为整型，意味着其小数部分会被舍去。例如键名 8.7 实际会被储存为 8。
* 布尔值也会被转换成整型。即键名 true 实际会被储存为 1 而键名 false 会被储存为 0。
* [Null](itss://chm/res/language.types.null.html)会被转换为空字符串，即键名 null 实际会被储存为 ""。
* 数组和对象不能被用为键名。坚持这么做会导致警告：Illegal offset type。

> 如果在数组定义中多个单元都使用了同一个键名，则只使用了最后一个，之前的都被覆盖了

# **数组运算符**

| **例子** | **名称** | **结果** |
| :--- | :--- | :--- |
| $a + $b | 联合 | $a 和 $b 的联合。 |
| $a == $b | 相等 | 如果 $a 和 $b 具有相同的键／值对则为**TRUE**。 |
| $a === $b | 全等 | 如果 $a 和 $b 具有相同的键／值对并且顺序和类型都相同则为**TRUE**。 |
| $a != $b | 不等 | 如果 $a 不等于 $b 则为**TRUE**。 |
| $a &lt;&gt; $b | 不等 | 如果 $a 不等于 $b 则为**TRUE**。 |
| $a !== $b | 不全等 | 如果 $a 不全等于 $b 则为**TRUE**。 |

> * 运算符把右边的数组元素附加到左边的数组后面，两个数组中都有的键名，则只用左边数组中的，右边的被忽略。\(与array\_merge区别\)

**比较数组**

```php
$a = array("apple", "banana");
$b = array(1 => "banana", "0" => "apple");

var_dump($a == $b); // bool(true)
var_dump($a === $b); // bool(false)
```

> 数组中的单元如果具有相同的键名和值则比较时相等。



