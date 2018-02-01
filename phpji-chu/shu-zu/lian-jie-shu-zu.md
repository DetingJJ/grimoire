假设我们有两个数组，keys，values；其中keys为我们要得到的关联数组的健，values为对应的值，可以使用函数array\_combine得到一个关联数组：

```php
array array_combine (array $keys, array $values)
```

例子：

```php
代码：
$a = array('green', 'red', 'yellow');
$b = array('avocado', 'apple', 'banana');
$c = array_combine($a, $b);
print_r($c);

运行结果：
Array
(
    [green]  => avocado
    [red]    => apple
    [yellow] => banana
)
```

**注意：**

1.如果keys中有两个相同的值，以最后一个为准。

```php
代码：
$a = array('green', 'green', 'yellow');
$b = array('avocado', 'apple', 'banana');
$c = array_combine($a, $b);
print_r($c);

运行结果：
Array
(
    [green]  => apple
    [yellow] => banana
)
```

**如果想保留多个值，php手册上有现成的轮子：**

```php
代码：
function array_combine_($keys, $values)
{
    $result = array();
    foreach ($keys as $i => $k) {
        $result[$k][] = $values[$i];
    }
    array_walk($result, create_function('&$v', 'var_dump($v); $v = (count($v) == 1)? array_pop($v): $v;'));
    return    $result;
}

print_r(array_combine_(Array('a','a','b'), Array(1,2,3)));


运行结果:
Array
(
    [a] => Array
        (
            [0] => 1
            [1] => 2
        )

    [b] => 3
)
```



