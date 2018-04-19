## 选择排序

**选择排序**（Selection sort）是一种简单直观的[排序算法](https://zh.wikipedia.org/wiki/%E6%8E%92%E5%BA%8F%E7%AE%97%E6%B3%95)。它的工作原理如下。首先在未排序序列中找到最小（大）元素，存放到排序序列的起始位置，然后，再从剩余未排序元素中继续寻找最小（大）元素，然后放到已排序序列的末尾。以此类推，直到所有元素均排序完毕。

选择排序的主要优点与数据移动有关。如果某个元素位于正确的最终位置上，则它不会被移动。选择排序每次交换一对元素，它们当中至少有一个将被移到其最终位置上，因此对{\displaystyle n}![](https://wikimedia.org/api/rest_v1/media/math/render/svg/a601995d55609f2d9f5e233e36fbe9ea26011b3b "n")个元素的表进行排序总共进行至多{\displaystyle n-1}![](https://wikimedia.org/api/rest_v1/media/math/render/svg/fbd0b0f32b28f51962943ee9ede4fb34198a2521 "{\displaystyle n-1}")次交换。在所有的完全依靠交换去移动元素的排序方法中，选择排序属于非常好的一种。

## **功能**

给出一组数A：\[0, 2, 3, 4, 6, 7, 1, 8, 5, 9\]，A：\[0, 1, 2, 3, 4, 5, 6, 7, 8, 9\]，实现递增排序。

## 动图演示

![](/assets/Insertion_sort_animation.gif)

## 步骤

step1. 比较相邻的元素 el, er，若 el &gt; er，则交换 el，er 的位置；

step2. 对每一对相邻的元素做 1 中的工作，直到最后一对数据。这样最后一个元素会变成最大的数；

step3. 针对所有的元素重复以上步骤，除了最后一个；

step4. 重复以上步骤，知道没有数据交换为止。

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



