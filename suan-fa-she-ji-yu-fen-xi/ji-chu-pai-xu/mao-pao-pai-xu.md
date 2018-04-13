**算法功能：**

给出一组数A：\[0,2,3,4,6,7,1,8,5,9\]，A：\[0,1,2,3,4,5,6,7,8,9\]，实现递增排序。

**思路：**

1. 遍历数组A，对于相邻的元素el,er，若el&gt;er，则交换el，er的位置。
2. 直到一次遍历不发生交换行为为止（最终，最大元素emax位于数组末尾）。

**代码要点：**

```php
function bubble_sort(&$arrA) {
    $intCT = count($arrA);
    for ($i = 0; $i < $intCT - 1; $i++) {
        for ($j = $i + 1; $j < $intCT; $j++) {
            if ($arrA[$i] > $arrA[$j]) {
                my_swap($arrA[$i], $arrA[$j]);
            }
        }
    }
}

function my_swap(&$a, &$b) {
    list($b, $a) = array($a, $b);
}
```

**测试：**

```php
$arrA = array(
    0,2,3,4,6,7,1,8,5,9
);

print_r($arrA);

bubble_sort($arrA);

print_r($arrA);

输出：
Array
(
    [0] => 0
    [1] => 2
    [2] => 3
    [3] => 4
    [4] => 6
    [5] => 7
    [6] => 1
    [7] => 8
    [8] => 5
    [9] => 9
)
Array
(
    [0] => 0
    [1] => 1
    [2] => 2
    [3] => 3
    [4] => 4
    [5] => 5
    [6] => 6
    [7] => 7
    [8] => 8
    [9] => 9
)
```



