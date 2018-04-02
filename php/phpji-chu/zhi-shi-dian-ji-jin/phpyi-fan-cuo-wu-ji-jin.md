## 易犯错误 \#1: 在`foreach`循环后留下数组的引用

还不清楚 PHP 中`foreach`遍历的工作原理？如果你在想遍历数组时操作数组中每个元素，在`foreach`循环中使用引用会十分方便，例如

```php
$arr = array(1, 2, 3, 4);
foreach ($arr as &$value) {
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

* 第一步：复制`$array[0]`（也就是 1 ）到`$value`（`$value`其实是`$array`最后一个元素的引用，即`$array[2]`），所以`$array[2]`现在等于 1。所以`$array`现在包含 \[1, 2, 1\]
* 第二步：复制`$array[1]`（也就是 2 ）到`$value`（`$array[2]`的引用），所以`$array[2]`现在等于 2。所以`$array`现在包含 \[1, 2, 2\]
* 第三步：复制`$array[2]`（现在等于 2 ） 到`$value`（`$array[2]`的引用），所以`$array[2]`现在等于 2 。所以`$array`现在包含 \[1, 2, 2\]

为了在`foreach`中方便的使用引用而免遭这种麻烦，请在`foreach`执行完毕后`unset()`掉这个保留着引用的变量。例如

```php
$arr = array(1, 2, 3, 4);
foreach ($arr as &$value) {
    $value = $value * 2;
}
unset($value);   // $value 不再引用 $arr[3]
```

## 常见错误 \#2： 误解 `isset()` 的行为

尽管名字叫_isset_，但是[`isset()`](https://link.juejin.im/?target=http%3A%2F%2Fwww.php.net%2Fmanual%2Fen%2Ffunction.isset.php) 不仅会在变量不存在的时候返回`false`，在变量值为`null`的时候也会返回`false`。

这种行为比最初出现的问题更为棘手，同时也是一种常见的错误源。

看看下面的代码：

```php
$data = fetchRecordFromStorage($storage, $identifier);
if (!isset($data['keyShouldBeSet']) {
    // do something here if 'keyShouldBeSet' is not set
}
```

开发者想必是想确认 `keyShouldBeSet` 是否存在于 `$data`中。然而，正如上面说的，如果 `$data['keyShouldBeSet']`存在并且值为`null`的时候， `isset($data['keyShouldBeSet'])` 也会返回`false`。所以上面的逻辑是不严谨的。

我们来看另外一个例子：

```php
if ($_POST['active']) {
    $postData = extractSomething($_POST);
}

// ...

if (!isset($postData)) {
    echo 'post not active';
}
```

上述代码，通常认为，假如 `$_POST['active']` 返回 `true`，那么 `postData` 必将存在，因此 `isset($postData)` 也将返回 `true`。反之， `isset($postData)`返回 `false` 的唯一可能是 `$_POST['active']` 也返回 `false`。

然而事实并非如此！

如我所言，如果`$postData` 存在且被设置为 `null`，`isset($postData)` 也会返回 `false` 。 也就是说，即使 `$_POST['active']` 返回 `true`， `isset($postData)` 也可能会返回 `false` 。 再一次说明上面的逻辑不严谨。

顺便一提，如果上面代码的意图真的是再次确认 `$_POST['active']`是否返回`true`，依赖 `isset()` 来做，不管对于哪种场景来说都是一种糟糕的决定。更好的做法是再次检查`$_POST['active']`，即：

```php
if ($_POST['active']) {
    $postData = extractSomething($_POST);
}

// ...

if ($_POST['active']) {
    echo 'post not active';
}
```

对于这种情况，虽然检查一个变量是否真的存在很重要（即：区分一个变量是未被设置还是被设置为 `null`）；但是使用[`array_key_exists()`](https://link.juejin.im/?target=http%3A%2F%2Fwww.php.net%2Fmanual%2Fen%2Ffunction.array-key-exists.php) 这个函数却是个更健壮的解决途径。

比如，我们可以像下面这样重写上面第一个例子：

```php
$data = fetchRecordFromStorage($storage, $identifier);
if (! array_key_exists('keyShouldBeSet', $data)) {
    // do this if 'keyShouldBeSet' isn't set
}
```

另外，通过结合`array_key_exists()`和 [`get_defined_vars()`](https://link.juejin.im/?target=http%3A%2F%2Fwww.php.net%2Fmanual%2Fen%2Ffunction.get-defined-vars.php)， 我们能更加可靠的判断一个变量在当前作用域中是否存在：

```php
if (array_key_exists('varShouldBeSet', get_defined_vars())) {
    // variable $varShouldBeSet exists in current scope
}
```

## 常见错误 \#3：关于通过引用返回与通过值返回的困惑

考虑下面的代码片段：

```php
class Config
{
    private $values = [];

    public function getValues() {
        return $this->values;
    }
}

$config = new Config();

$config->getValues()['test'] = 'test';
echo $config->getValues()['test'];
```

如果你运行上面的代码，将得到下面的输出：

```
PHP Notice:  Undefined index: test in /path/to/my/script.php on line 21
```

出了什么问题？

上面代码的问题在于没有搞清楚通过引用与通过值返回数组的区别。除非你明确告诉 PHP 通过引用返回一个数组（例如，使用`&`），否则 PHP 默认将会「通过值」返回这个数组。这意味着这个数组的一份拷贝将会被返回，因此被调函数与调用者所访问的数组并不是同样的数组实例。

所以上面对`getValues()`的调用将会返回`$values`数组的一份拷贝，而不是对它的引用。考虑到这一点，让我们重新回顾一下以上例子中的两个关键行：

```php
// getValues() 返回了一个 $values 数组的拷贝
// 所以`test`元素被添加到了这个拷贝中，而不是 $values 数组本身。
$config->getValues()['test'] = 'test';


// getValues() 又返回了另一份 $values 数组的拷贝
// 且这份拷贝中并不包含一个`test`元素（这就是为什么我们会得到 「未定义索引」 消息）。
echo $config->getValues()['test'];

```

一个可能的修改方法是存储第一次通过`getValues()`返回的`$values`数组拷贝，然后后续操作都在那份拷贝上进行；例如：

```php
$vals = $config->getValues();
$vals['test'] = 'test';
echo $vals['test'];
```

这段代码将会正常工作（例如，它将会输出`test`而不会产生任何「未定义索引」消息），但是这个方法可能并不能满足你的需求。特别是上面的代码并不会修改原始的`$values`数组。如果你想要修改原始的数组（例如添加一个`test`元素），就需要修改`getValues()`函数，让它返回一个`$values`数组自身的引用。通过在函数名前面添加一个`&`来说明这个函数将返回一个引用；例如：

```php
class Config
{
    private $values = [];

    // 返回一个 $values 数组的引用
    public function &getValues() {
        return $this->values;
    }
}

$config = new Config();

$config->getValues()['test'] = 'test';
echo $config->getValues()['test'];
```

这会输出期待的`test`。

但是现在让事情更困惑一些，请考虑下面的代码片段：

```php
class Config
{
    private $values;

    // 使用数组对象而不是数组
    public function __construct() {
        $this->values = new ArrayObject();
    }

    public function getValues() {
        return $this->values;
    }
}

$config = new Config();

$config->getValues()['test'] = 'test';
echo $config->getValues()['test'];
```

如果你认为这段代码会导致与之前的`数组`例子一样的「未定义索引」错误，那就错了。实际上，这段代码将会正常运行。原因是，与数组不同，**PHP 永远会将对象按引用传递**。（`ArrayObject`是一个 SPL 对象，它完全模仿数组的用法，但是却是以对象来工作。）

像以上例子说明的，你应该以引用还是拷贝来处理通常不是很明显就能看出来。因此，理解这些默认的行为（例如，变量和数组以值传递；对象以引用传递）并且仔细查看你将要调用的函数 API 文档，看看它是返回一个值，数组的拷贝，数组的引用或是对象的引用是必要的。

尽管如此，我们要认识到应该尽量避免返回一个数组或`ArrayObject`，因为这会让调用者能够修改实例对象的私有数据。这就破坏了对象的封装性。所以最好的方式是使用传统的「getters」和「setters」，例如：

```php
class Config
{
    private $values = [];

    public function setValue($key, $value) {
        $this->values[$key] = $value;
    }

    public function getValue($key) {
        return $this->values[$key];
    }
}

$config = new Config();

$config->setValue('testKey', 'testValue');
echo $config->getValue('testKey');    // 输出『testValue』
```

这个方法让调用者可以在不对私有的`$values`数组本身进行公开访问的情况下设置或者获取数组中的任意值。



## 常见的错误 \#4：在循环中执行查询

如果像这样的话，一定不难见到你的 PHP 无法正常工作。

```php
$models = [];

foreach ($inputValues as $inputValue) {
    $models[] = $valueRepository->findByValue($inputValue);
}
```

这里也许没有真正的错误， 但是如果你跟随着代码的逻辑走下去， 你也许会发现这个看似无害的调用`$valueRepository->findByValue()` 最终执行了这样一种查询，例如：

```php
$result = $connection->query("SELECT `x`,`y` FROM `values` WHERE `value`=" . $inputValue);

```

结果每轮循环都会产生一次对数据库的查询。 因此，假如你为这个循环提供了一个包含 1000 个值的数组，它会对资源产生 1000 单独的请求！如果这样的脚本在多个线程中被调用，他会有导致系统崩溃的潜在危险。

因此，至关重要的是，当你的代码要进行查询时，应该尽可能的收集需要用到的值，然后在一个查询中获取所有结果。

一个我们平时常常能见到查询效率低下的地方 （例如：在循环中）是使用一个数组中的值 \(比如说很多的 ID \)向表发起请求。检索每一个 ID 的所有的数据，代码将会迭代这个数组，每个 ID 进行一次SQL查询请求，它看起来常常是这样：

```php
$data = [];
foreach ($ids as $id) {
    $result = $connection->query("SELECT `x`, `y` FROM `values` WHERE `id` = " . $id);
    $data[] = $result->fetch_row();
}

```

但是_只用一条_SQL 查询语句就可以更高效的完成相同的工作，比如像下面这样：

```php
$data = [];
if (count($ids)) {
    $result = $connection->query("SELECT `x`, `y` FROM `values` WHERE `id` IN (" . implode(',', $ids));
    while ($row = $result->fetch_row()) {
        $data[] = $row;
    }
}

```

因此在你的代码直接或间接进行查询请求时，一定要认出这种查询。尽可能的通过一次查询得到想要的结果。然而，依然要小心谨慎，不然就可能会出现下面我们要讲的另一个易犯的错误...





> [https://juejin.im/entry/5ac202605188255cb32e4daf?utm\_source=gold\_browser\_extension](https://juejin.im/entry/5ac202605188255cb32e4daf?utm_source=gold_browser_extension)



