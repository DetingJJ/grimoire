**目标：实现多个数组的合并。**

涉及到的函数：

```php
array array_merge ( array $array1 [, array $... ] )
```

**注意：**

1.待合并数组如果有key则保留，如果没有这按序从0开始编号。

2.如果不同数组中有相同的key，则使用最后一个具有此key的数组对应的value。

3.对于key为数字的，key将会以连续的方式重新索引（如例子2）。

例子1：

```php
代码：
$array1 = array("color" => "red", 2, 4);
$array2 = array("a", "b", "color" => "green", "shape" => "trapezoid", 4);
$result = array_merge($array1, $array2);
print_r($result);

运行结果：
Array
(
    [color] => green
    [0] => 2
    [1] => 4
    [2] => a
    [3] => b
    [shape] => trapezoid
    [4] => 4
)
```

例子2：

```php
代码：
$array1 = array();
$array2 = array(1 => "data");
$result = array_merge($array1, $array2);

运行结果：
Array
(
    [0] => data
)
```

注意：这里的key为数字，合并后会自动从0开始索引。

**上面的例子是以后面array的值为准，如果想以前面的数组为准（数组合并时不覆盖），有没有办法呢？答案当然是肯定的。废话少说直接上代码。**

代码：

```php
代码：
$array1 = array(0 => 'zero_a', 2 => 'two_a', 3 => 'three_a');
$array2 = array(1 => 'one_b', 3 => 'three_b', 4 => 'four_b');
$result = $array1 + $array2;
var_dump($result);

运行结果：
array(5) {
  [0]=>
  string(6) "zero_a"
  [2]=>
  string(5) "two_a"
  [3]=>
  string(7) "three_a"
  [1]=>
  string(5) "one_b"
  [4]=>
  string(6) "four_b"
}
```

**问题升级，如果当key冲突时，想同时保留输入数组的值，有木有办法嘞？**

例子3：

```php
代码：
$array1 = array("color" => "red", 2, 4);
$array2 = array("a", "b", "color" => "green", "shape" => "trapezoid", 4);
$result = array_merge($array1, $array2);
print_r($result);
$result2 = array_merge_recursive($array1, $array2);
print_r($result2);

运行结果：
Array
(
    [color] => green
    [0] => 2
    [1] => 4
    [2] => a
    [3] => b
    [shape] => trapezoid
    [4] => 4
)
Array
(
    [color] => Array
        (
            [0] => red
            [1] => green
        )

    [0] => 2
    [1] => 4
    [2] => a
    [3] => b
    [shape] => trapezoid
    [4] => 4
)
```



