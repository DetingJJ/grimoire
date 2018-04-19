## **功能**

给出一组数A：\[0,2,3,4,6,7,1,8,5,9\]，A：\[0,1,2,3,4,5,6,7,8,9\]，实现递增排序。

## 步骤

step1. 比较相邻的元素 el, er，若 el &gt; er，则交换 el，er 的位置。

step2. 对每一对相邻的元素做 1 中的工作，直到最后一对数据。这样最后一个元素会变成最大的数。

step3. 针对所有的元素重复以上步骤，除了最后一个。

step4. 在

## 实现

* ### PHP**实现**

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



