## 易犯错误 \#1: 在`foreach`循环后留下数组的引用

还不清楚 PHP 中`foreach`遍历的工作原理？如果你在想遍历数组时操作数组中每个元素，在`foreach`循环中使用引用会十分方便，例如

```php
$arr = array(1, 2, 3, 4);
foreach ($arr as 
&
$value) {
        $value = $value * 2;
}
// $arr 现在是 array(2, 4, 6, 8)
```

问题是，如果你不注意的话这会导致一些意想不到的负面作用。在上述例子，在代码执行完以后，`$value`仍保留在作用域内，并保留着对数组最后一个元素的引用。之后与`$value`相关的操作会无意中修改数组中最后一个元素的值。

你要记住`foreach`并不会产生一个块级作用域。因此，在上面例子中`$value`是一个全局引用变量。在`foreach`遍历中，每一次迭代都会形成一个对`$arr`下一个元素的引用。当遍历结束后，`$value`会引用`$arr`的最后一个元素，并保留在作用域中

这种行为会导致一些不易发现的，令人困惑的bug，以下是一个例子

```php
$array = [1, 2, 3];
echo implode(',', $array), "\n";

foreach ($array as &$value) {}    // 通过引用遍历
echo implode(',', $array), "\n";

foreach ($array as $value) {}     // 通过赋值遍历
echo implode(',', $array), "\n";
```

以上代码会输出

```
1,2,3
1,2,3
1,2,2
```

你没有看错，最后一行的最后一个值是 2 ，而不是 3 ，为什么？

在完成第一个`foreach`遍历后，`$array`并没有改变，但是像上述解释的那样，`$value`留下了一个对`$array`最后一个元素的危险的引用（因为`foreach`通过引用获得`$value`）

这导致当运行到第二个`foreach`，这个"奇怪的东西"发生了。当`$value`通过赋值获得，`foreach`按顺序复制每个`$array`的元素到`$value`时，第二个`foreach`里面的细节是这样的

* 第一步：复制
  `$array[0]`
  （也就是 1 ）到
  `$value`
  （
  `$value`
  其实是
  `$array`
  最后一个元素的引用，即
  `$array[2]`
  ），所以
  `$array[2]`
  现在等于 1。所以
  `$array`
  现在包含 \[1, 2, 1\]
* 第二步：复制
  `$array[1]`
  （也就是 2 ）到
  `$value`
  （
  `$array[2]`
  的引用），所以
  `$array[2]`
  现在等于 2。所以
  `$array`
  现在包含 \[1, 2, 2\]
* 第三步：复制
  `$array[2]`
  （现在等于 2 ） 到
  `$value`
  （
  `$array[2]`
  的引用），所以
  `$array[2]`
  现在等于 2 。所以
  `$array`
  现在包含 \[1, 2, 2\]

为了在`foreach`中方便的使用引用而免遭这种麻烦，请在`foreach`执行完毕后`unset()`掉这个保留着引用的变量。例如

```
$arr = array(1, 2, 3, 4);
foreach ($arr as 
&
$value) {
    $value = $value * 2;
}
unset($value);   // $value 不再引用 $arr[3]
```

> [https://juejin.im/entry/5ac202605188255cb32e4daf?utm\_source=gold\_browser\_extension](https://juejin.im/entry/5ac202605188255cb32e4daf?utm_source=gold_browser_extension)



