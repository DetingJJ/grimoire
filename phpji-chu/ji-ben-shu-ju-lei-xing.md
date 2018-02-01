PHP支持9种原始数据类型。

四种变量类型：

* boolen（布尔型）
* integer（整形）
* float（浮点型，也成为double型）
* string（字符串）

两种特殊类型

* resource（资源）
* NULL（无类型）

**Note：**

检测某变量是否为某个类型，可以用is\_type函数。另，gettype\(\)函数可以获得某个变量的类型。

如果要将一个变量强制转换为某类型，可以对其使用强制转换或者settype\(\)函数。

> 注意变量根据其当时的类型在特定场合下会表现出不同的值。

```
$a_bool = TRUE;   // 布尔值 boolean
$a_str  = "foo";  // 字符串 string
$a_str2 = 'foo';  // 字符串 string
$an_int = 12;     // 整型 integer
echo gettype($a_bool); // 输出:  boolean
echo gettype($a_str);  // 输出:  string
// 如果是整型，就加上 4
if (is_int($an_int)) {
    $an_int += 4;
}
// 如果 $bool 是字符串，就打印出来
// (啥也没打印出来)
if (is_string($a_bool)) {
    echo "String: $a\_bool";
}
```



