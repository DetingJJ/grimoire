数组拆分神器array\_slice，

```php
array array_slice ( array $array , int $offset [, int $length = NULL [, bool $preserve_keys = false ]] )

参数：
array
输入的数组。

offset
如果 offset 非负，则序列将从 array 中的此偏移量开始。如果 offset 为负，则序列将从 array 中距离末端这么远的地方开始。

length
如果给出了 length 并且为正，则序列中将具有这么多的单元。如果给出了 length 并且为负，则序列将终止在距离数组末端这么远的地方。如果省略，则序列将从 offset 开始一直到 array 的末端。

preserve_keys
注意 array_slice() 默认会重新排序并重置数组的数字索引。你可以通过将 preserve_keys 设为 TRUE 来改变此行为。
```

例子1：

```php
代码：
$input = array("a", "b", "c", "d", "e");

$output = array_slice($input, 2);      // returns "c", "d", and "e"
$output = array_slice($input, -2, 1);  // returns "d"
$output = array_slice($input, 0, 3);   // returns "a", "b", and "c"

// note the differences in the array keys
print_r(array_slice($input, 2, -1));
print_r(array_slice($input, 2, -1, true));

/** GENERATED OUTPUT
Array
(
    [0] => c
    [1] => d
)
Array
(
    [2] => c
    [3] => d
)
*/
```

注意：

1.针对key为int，或者数字字符串，可能出现意想不到的结果，如例2；

```php
代码：
//create an array 
$ar = array('a'=>'apple', 'b'=>'banana', '42'=>'pear', 'd'=>'orange'); 

print_r($ar); 
// print_r describes the array as: 
// Array 
// ( 
//    [a] => apple 
//    [b] => banana 
//    [42] => pear 
//    [d] => orange 
// ) 

//use array_slice() to extract the first three elements 
$new_ar = array_slice($ar, 0, 3); 

print_r($new_ar); 
// print_r describes the new array as: 
// Array 
// ( 
//    [a] => apple 
//    [b] => banana 
//    [0] => pear 
// ) 

说明：
The value 'pear' has had its key reassigned from '42' to '0'. 

When $ar is initially created the string '42' is automatically type-converted by array() into an integer. 
array_slice() and array_splice() reassociate string keys from the passed array to their values in the 
returned array but numeric keys are reindexed starting with 0.
```

[http://justcoding.iteye.com/blog/1181962](http://justcoding.iteye.com/blog/1181962)

