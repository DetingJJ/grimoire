**Boolean 布尔类型**

这是最简单的类型。boolean 表达了真值，可以为**TRUE**或**FALSE**。

> 要指定一个布尔值，使用常量**TRUE**或**FALSE**。两个都不区分大小写。

**转换为布尔值**

要明确地将一个值转换成 boolean，用 \(bool\) 或者 \(boolean\) 来强制转换。但是很多情况下不需要用强制转换，因为当运算符，函数或者流程控制结构需要一个 boolean 参数时，该值会被自动转换。

当转换为 boolean 时，以下值被认为是**FALSE**：

* 布尔值**FALSE**本身
* 整型值 0（零）
* 浮点型值 0.0（零）
* 空字符串，以及字符串"0"
* 不包括任何元素的数组
* 特殊类型NULL（包括尚未赋值的变量）
* 从空标记生成的SimpleXML对象

> 所有其它值都被认为是TRUE（包括任何资源和NAN）

**举个栗子：**

```php
var_dump((bool) "");        // bool(false)
var_dump((bool) 1);         // bool(true)
var_dump((bool) -2);        // bool(true)
var_dump((bool) "foo");     // bool(true)
var_dump((bool) 2.3e5);     // bool(true)
var_dump((bool) array(12)); // bool(true)
var_dump((bool) array());   // bool(false)
var_dump((bool) "false");   // bool(true)
```



