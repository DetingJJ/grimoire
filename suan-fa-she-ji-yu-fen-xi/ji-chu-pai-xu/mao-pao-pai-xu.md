## 算法介绍

**冒泡排序**（Bubble Sort）也是一种简单直观的排序算法。它重复地走访过要排序的数列，一次比较两个元素，如果他们的顺序错误就把他们交换过来。走访数列的工作是重复地进行直到没有再需要交换，也就是说该数列已经排序完成。这个算法的名字由来是因为越小的元素会经由交换慢慢“浮“到数列的顶端。

| 数据结构 | 数组 |
| :--- | :--- |
| 最坏时间复杂度 | O\(n^2\) |
| 最优时间复杂度 | O\(n\) |
| 平均时间复杂度 | O\(n^2\) |
| 空间复杂度 | 总共 O\(n\)，需要辅助空间 O\(1\) |

## **功能**

给出一组数A：\[0, 2, 3, 4, 6, 7, 1, 8, 5, 9\]，A：\[0, 1, 2, 3, 4, 5, 6, 7, 8, 9\]，实现递增排序。

## 步骤

step1. 比较相邻的元素 el, er，若 el &gt; er，则交换 el，er 的位置；

step2. 对每一对相邻的元素做 1 中的工作，直到最后一对数据。这样最后一个元素会变成最大的数；

step3. 针对所有的元素重复以上的步骤，除了最后一个；

step4. 重复以上步骤，直到没有数据交换为止。

## 实现

* ### PHP**实现**

```php
function bubble_sort(&$arrA) {
    $intCT = count($arrA);
    for ($el = 0; $el < $intCT - 1; $el++) {
        for ($er = $rl + 1; $er < $intCT; $er++) {
            if ($arrA[$el] > $arrA[$er]) {
                my_swap($arrA[$el], $arrA[$er]);
            }
        }
    }
}

function my_swap(&$a, &$b) {
    list($b, $a) = array($a, $b);
}
```

**测试用例：**

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



