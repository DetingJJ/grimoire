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

这里也许没有真正的错误， 但是如果你跟随着代码的逻辑走下去， 你也许会发现这个看似无害的调用`$valueRepository->findByValue()` 最终执行了这样一种查询，例如：

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

但是\_只用一条\_SQL 查询语句就可以更高效的完成相同的工作，比如像下面这样：

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

## 常见问题 \#5: 内存使用欺骗与低效

一次取多条记录肯定是比一条条的取高效，但是当我们使用 PHP 的 `mysql` 扩展的时候，这也可能成为一个导致 `libmysqlclient` 出现『内存不足』（out of memory）的条件。

我们在一个测试盒里演示一下，该测试盒的环境是：有限的内存（512MB RAM），MySQL，和`php-cli`。

我们将像下面这样引导一个数据表：

```php
// 连接 mysql
$connection = new mysqli('localhost', 'username', 'password', 'database');

// 创建 400 个字段
$query = 'CREATE TABLE `test`(`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT';
for ($col = 0; $col < 400; $col++) {
    $query .= ", `col$col` CHAR(10) NOT NULL";
}
$query .= ');';
$connection->query($query);

// 写入 2 百万行数据
for ($row = 0; $row < 2000000; $row++) {
    $query = "INSERT INTO `test` VALUES ($row";
    for ($col = 0; $col < 400; $col++) {
        $query .= ', ' . mt_rand(1000000000, 9999999999);
    }
    $query .= ')';
    $connection->query($query);
}
```

OK，现在让我们一起来看一下内存使用情况：

```php
// 连接 mysql
$connection = new mysqli('localhost', 'username', 'password', 'database');
echo "Before: " . memory_get_peak_usage() . "\n";

$res = $connection->query('SELECT `x`,`y` FROM `test` LIMIT 1');
echo "Limit 1: " . memory_get_peak_usage() . "\n";

$res = $connection->query('SELECT `x`,`y` FROM `test` LIMIT 10000');
echo "Limit 10000: " . memory_get_peak_usage() . "\n";
```

输出结果是：

```
Before: 224704
Limit 1: 224704
Limit 10000: 224704
```

Cool。 看来就内存使用而言，内部安全地管理了这个查询的内存。

为了更加明确这一点，我们把限制提高一倍，使其达到 100,000。 额~如果真这么干了，我们将会得到如下结果：

```
PHP Warning:  mysqli::query(): (HY000/2013):
              Lost connection to MySQL server during query in /root/test.php on line 11
```

究竟发生了啥？

这就涉及到 PHP 的 `mysql`模块的工作方式的问题了。它其实只是个`libmysqlclient`的代理，专门负责干脏活累活。每查出一部分数据后，它就立即把数据放入内存中。_由于这块内存还没被 PHP 管理，所以，当我们在查询里增加限制的数量的时候，_`memory_get_peak_usage()`_ 不会显示任何增加的资源使用情况_ 。我们被『内存管理没问题』这种自满的思想所欺骗了，所以才会导致上面的演示出现那种问题。 老实说，我们的内存管理确实是有缺陷的，并且我们也会遇到如上所示的问题。

如果使用 `mysqlnd` 模块的话，你至少可以避免上面那种欺骗（尽管它自身并不会提升你的内存利用率）。 `mysqlnd`被编译成原生的 PHP 扩展，并且确实**会**使用 PHP 的内存管理器。

因此，如果使用 `mysqlnd` 而不是 `mysql`，我们将会得到更真实的内存利用率的信息：

```
Before: 232048
Limit 1: 324952
Limit 10000: 32572912
```

顺便一提，这比刚才更糟糕。根据 PHP 的文档所说，`mysql` 使用 `mysqlnd` 两倍的内存来存储数据， 所以，原来使用 `mysql` 那个脚本真正使用的内存比这里显示的更多（大约是两倍）。

为了避免出现这种问题，考虑限制一下你查询的数量，使用一个较小的数字来循环，像这样：

```php
$totalNumberToFetch = 10000;
$portionSize = 100;

for ($i = 0; $i <= ceil($totalNumberToFetch / $portionSize); $i++) {
    $limitFrom = $portionSize * $i;
    $res = $connection->query(
                         "SELECT `x`,`y` FROM `test` LIMIT $limitFrom, $portionSize");
}
```

当我们把这个常见错误和上面的 [常见错误 \#4](https://link.juejin.im/?target=https%3A%2F%2Fwww.toptal.com%2Fphp%2F10-most-common-mistakes-php-programmers-make%23commonMistake4) 结合起来考虑的时候， 就会意识到我们的代码理想需要在两者间实现一个平衡。是让查询粒度化和重复化，还是让单个查询巨大化。生活亦是如此，平衡不可或缺；哪一个极端都不好，都可能会导致 PHP 无法正常运行。

## 常见错误 \#6: 忽略 Unicode/UTF-8 的问题

从某种意义上说，这实际上是PHP本身的一个问题，而不是你在调试 PHP 时遇到的问题，但是它从未得到妥善的解决。 PHP 6 的核心就是要做到支持 Unicode。但是随着 PHP 6 在 2010 年的暂停而搁置了。

这并不意味着开发者能够避免 [正确处理 UTF-8](https://link.juejin.im/?target=https%3A%2F%2Fwww.toptal.com%2Fphp%2Fa-utf-8-primer-for-php-and-mysql) 并避免做出所有字符串必须是『古老的 ASCII』的假设。 没有正确处理非 ASCII 字符串的代码会因为引入粗糙的 [海森堡bug（heisenbugs）](https://link.juejin.im/?target=https%3A%2F%2Fen.wikipedia.org%2Fwiki%2FHeisenbug) 而变得臭名昭著。当一个名字包含 『Schrödinger』的人注册到你的系统时，即使简单的 `strlen($_POST['name'])`调用也会出现问题。

下面是一些可以避免出现这种问题的清单：

* 如果你对 UTF-8 还不了解，那么你至少应该了解下基础的东西。 [这儿](https://link.juejin.im/?target=http%3A%2F%2Fwww.joelonsoftware.com%2Farticles%2FUnicode.html)有个很好的引子。
* 确保使用 [`mb_*`](https://link.juejin.im/?target=http%3A%2F%2Fwww.php.net%2Fmanual%2Fen%2Fref.mbstring.php) 函数代替老旧的字符串处理函数（需要先保证你的 PHP 构建版本开启了『多字节』（multibyte）扩展）。
* 确保你的数据库和表设置了 Unicode 编码（许多 MySQL 的构建版本仍然默认使用 `latin1`  ）。
* 记住 `json_encode()` 会转换非 ASCII 标识（比如： 『Schrödinger』会被转换成 『Schru00f6dinger』），但是`serialize()`**不会**转换。
* 确保 PHP 文件也是 UTF-8 编码，以避免在连接硬编码字符串或者配置字符串常量的时候产生冲突。

[Francisco Claria](https://link.juejin.im/?target=https%3A%2F%2Fwww.toptal.com%2Fresume%2Ffrancisco-sanchez-claria)  在本博客上发表的[UTF-8 Primer for PHP and MySQL](https://link.juejin.im/?target=https%3A%2F%2Fwww.toptal.com%2Fphp%2Fa-utf-8-primer-for-php-and-mysql)  是份宝贵的资源。

## 常见错误 \#7: 认为`$_POST`总是包含你 POST 的数据

不管它的名称，`$_POST`数组不是总是包含你 POST 的数据，他也有可能会是空的。 为了理解这一点，让我们来看一下下面这个例子。假设我们使用`jQuery.ajax()`模拟一个服务请求，如下：

```
// js
$.ajax({
    url: 'http://my.site/some/path',
    method: 'post',
    data: JSON.stringify({a: 'a', b: 'b'}),
    contentType: 'application/json'
});
```

（顺带一提，注意这里的`contentType: 'application/json'`。我们用 JSON 类型发送数据，这在接口中非常流行。这在[AngularJS`$http`service](https://link.juejin.im/?target=https%3A%2F%2Fdocs.angularjs.org%2Fapi%2Fng%2Fservice%2F)里是默认的发送数据的类型。）

在我们举例子的服务端，我们简单的打印一下 `$_POST`数组：

```php
// php
var_dump($_POST);
```

奇怪的是，结果如下：

```php
array(0) { }
```

为什么？我们的 JSON 串`{a: 'a', b: 'b'}`究竟发生了什么？

原因在于 _当内容类型为_`application/x-www-form-urlencoded`_或者_`multipart/form-data`的时候 PHP 只会自动解析一个 POST 的有效内容。这里面有历史的原因 --- 这两种内容类型是在 PHP 的`$_POST`实现前就已经在使用了的两个重要的类型。所以不管使用其他任何内容类型 （即使是那些现在很流行的，像 `application/json`）， PHP 也不会自动加载到 POST 的有效内容。

既然`$_POST`是一个超级全局变量，如果我们重写_一次_（在我们的脚本里尽可能早的），被修改的值（包括 POST 的有效内容）将可以在我们的代码里被引用。这很重要因为 `$_POST`已经被 PHP 框架和几乎所有的自定义的脚本普遍使用来获取和传递请求数据。

所以，举个例子，当处理一个内容类型为 `application/json`的 POST 有效内容的时候 ，我们需要手动解析请求内容（decode 出 JSON 数据）并且覆盖`$_POST`变量，如下：

```php
// php
$_POST = json_decode(file_get_contents('php://input'), true);
```

然后当我们打印`$_POST`数组的时候，我们可以看到他正确的包含了 POST 的有效内容；如下：

```php
array(2) { ["a"]=> string(1) "a" ["b"]=> string(1) "b" }
```

## 常见错误 \#8: 认为 PHP 支持单字符数据类型

阅读下面的代码并思考会输出什么：

```php
for ($c = 'a'; $c <= 'z'; $c++) {
    echo $c . "\n";
}
```

如果你的答案是`a`到`z`，那么你可能会对这是一个错误答案感到吃惊。

没错，它确实会输出`a`到`z`，但是，它还会继续输出`aa`到`yz`。我们一起来看一下这是为什么。

PHP 中没有 `char` 数据类型； 只能用 `string` 类型。记住一点，在 PHP 中增加 `string` 类型的`z` 得到的是 `aa`：

```
php> $c = 'z'; echo ++$c . "\n";
aa
```

没那么令人混淆的是，`aa`的字典顺序是 **小于**`z`的：

```
php> var_export((boolean)('aa' < 'z')) . "\n";
true
```

这也是为什么上面那段简单的代码会输出 `a` 到 `z`， 然后**继续** 输出`aa`到 `yz`。 它停在了 `za`，那是它遇到的第一个比 `z`**大**的：

```php
php> var_export((boolean)('za' < 'z')) . "\n";
false
```

事实上，在 PHP 里**有合适的**方式在循环中输出`a`到`z`的值：

```php
for ($i = ord('a'); $i <= ord('z'); $i++) {
    echo chr($i) . "\n";
}
```

或者是这样：

```php
$letters = range('a', 'z');

for ($i = 0; $i < count($letters); $i++) {
    echo $letters[$i] . "\n";
}
```

## 常见 错误 \#9: 忽视代码规范

尽管忽视代码标准并不直接导致需要去调试 PHP 代码，但这可能是所有需要谈论的事情里最重要的一项。

在一个项目中忽视代码规范能够导致大量的问题。最乐观的预计，前后代码不一致（在此之前每个开发者都在“做自己的事情”）。但最差的结果，PHP 代码不能运行或者很难（有时是不可能的）去顺利通过，这对于 调试代码、提升性能、维护项目来说也是困难重重。并且这意味着降低你们团队的生产力，增加大量的额外（或者至少是本不必要的）精力消耗。

幸运的是对于 PHP 开发者来说，存在 PHP 编码标准建议（PSR），它由下面的五个标准组成：

* [PSR-0](https://link.juejin.im/?target=http%3A%2F%2Fwww.php-fig.org%2Fpsr%2Fpsr-0%2F): 自动加载标准
* [PSR-1](https://link.juejin.im/?target=http%3A%2F%2Fwww.php-fig.org%2Fpsr%2Fpsr-1%2F): 基础编码标准
* [PSR-2](https://link.juejin.im/?target=http%3A%2F%2Fwww.php-fig.org%2Fpsr%2Fpsr-2%2F): 编码风格指导
* [PSR-3](https://link.juejin.im/?target=http%3A%2F%2Fwww.php-fig.org%2Fpsr%2Fpsr-3%2F): 日志接口
* [PSR-4](https://link.juejin.im/?target=http%3A%2F%2Fwww.php-fig.org%2Fpsr%2Fpsr-4%2F): 自动加载增强版

PSR 起初是由市场上最大的组织平台维护者创造的。 Zend, Drupal, Symfony, Joomla 和 [其他](https://link.juejin.im/?target=http%3A%2F%2Fwww.php-fig.org%2F) 为这些标准做出了贡献，并一直遵守它们。甚至，多年前试图成为一个标准的 PEAR ，现在也加入到 PSR 中来。

某种意义上，你的代码标准是什么几乎是不重要的，只要你遵循一个标准并坚持下去，但一般来讲，跟随 PSR 是一个很不错的主意，除非你的项目上有其他让人难以抗拒的理由。越来越多的团队和项目正在遵从 PSR 。在这一点上，大部分的 PHP 开发者达成了共识，因此使用 PSR 代码标准，有利于使新加入团队的开发者对你的代码标准感到更加的熟悉与舒适。

## 常见错误 \#10:  滥用`empty()`

一些 PHP 开发者喜欢对几乎所有的事情使用 `empty()` 做布尔值检验。不过，在一些情况下，这会导致混乱。

首先，让我们回到数组和 `ArrayObject` 实例（和数组类似）。考虑到他们的相似性，很容易假设它们的行为是相同的。然而，事实证明这是一个危险的假设。举例，在 PHP 5.0 中:

```php
// PHP 5.0 或后续版本:
$array = [];
var_dump(empty($array));        // 输出 bool(true)
$array = new ArrayObject();
var_dump(empty($array));        // 输出 bool(false)
// 为什么这两种方法不产生相同的输出呢？
```

更糟糕的是，PHP 5.0之前的结果可能是不同的：

```php
// PHP 5.0 之前:
$array = [];
var_dump(empty($array));        // 输出 bool(false)
$array = new ArrayObject();
var_dump(empty($array));        // 输出 bool(false)
```

这种方法上的不幸是十分普遍的。比如，在 Zend Framework 2 下的[`Zend\Db\TableGateway`](https://link.juejin.im/?target=http%3A%2F%2Fframework.zend.com%2Fmanual%2F2.3%2Fen%2Fmodules%2Fzend.db.table-gateway.html) 的`TableGateway::select()`结果中调用 `current()`时返回数据的方式，正如文档所表明的那样。开发者很容易就会变成此类数据错误的受害者。

为了避免这些问题的产生，更好的方法是使用`count()`去检验空数组结构：

```php
// 注意这会在 PHP 的所有版本中发挥作用 (5.0 前后都是):
$array = [];
var_dump(count($array));        // 输出 int(0)
$array = new ArrayObject();
var_dump(count($array));        // 输出 int(0)
```

顺便说一句, 由于 PHP 将`0`转换为`false`,`count()`能够被使用在`if()`条件内部去检验空数组。同样值得注意的是，在 PHP 中，`count()`在数组中是常量复杂度 \(`O(1)`操作\) ，这更清晰的表明它是正确的选择。

另一个使用`empty()`产生危险的例子是当它和魔术方法`_get()`一起使用。我们来定义两个类并使其都有一个`test`属性。

首先我们定义包含`test`公共属性的 `Regular` 类。

```php
class Regular
{
    public $test = 'value';
}
```

然后我们定义 `Magic` 类，这里使用魔术方法 `__get()` 来操作去访问它的 `test` 属性：

```php
class Magic
{
    private $values = ['test' => 'value'];

    public function __get($key)
    {
        if (isset($this->values[$key])) {
            return $this->values[$key];
        }
    }
}
```

好了，现在我们尝试去访问每个类中的`test`属性看看会发生什么：

```php
$regular = new Regular();
var_dump($regular->test);    // 输出 string(4) "value"
$magic = new Magic();
var_dump($magic->test);      // 输出 string(4) "value"
```

到目前为止还好。

但是现在当我们对其中的每一个都调用`empty()`，让我们看看会发生什么：

```php
var_dump(empty($regular->test));    // 输出 bool(false)
var_dump(empty($magic->test));      // 输出 bool(true)
```

咳。所以如果我们依赖`empty()`,我们很可能误认为`$magic`的属性`test`是空的，而实际上它被设置为`'value'`。

不幸的是，如果类使用魔术方法`__get()`来获取属性值，那么就没有万无一失的方法来检查该属性值是否为空。  
在类的作用域之外，你仅仅只能检查是否将返回一个`null`值，这并不意味着没有设置相应的键，因为它实际上还可能被设置为`null`。

相反，如果我们试图去引用`Regular`类实例中不存在的属性，我们将得到一个类似于以下内容的通知：

```
Notice: Undefined property: Regular::$nonExistantTest in /path/to/test.php on line 10

Call Stack:
    0.0012     234704   1. {main}() /path/to/test.php:0
```

所以这里的主要观点是`empty()`方法应该被谨慎地使用，因为如果不小心的话它可能导致混乱 -- 甚至潜在的误导 -- 结果。

## 总结

PHP 的易用性让开发者陷入一种虚假的舒适感，语言本身的一些细微差别和特质，可能花费掉你大量的时间去调试。这些可能会导致 PHP 程序无法正常工作，并导致诸如此处所述的问题。

PHP 在其20年的历史中，已经发生了显著的变化。花时间去熟悉语言本身的微妙之处是值得的，因为它有助于确保你编写的软件更具可扩展性，健壮和可维护性。

> 更多现代化 PHP 知识，请前往 [Laravel / PHP 知识社区](https://link.juejin.im/?target=https%3A%2F%2Flaravel-china.org)

文章摘自：

> [https://juejin.im/entry/5ac202605188255cb32e4daf?utm\_source=gold\_browser\_extension](https://juejin.im/entry/5ac202605188255cb32e4daf?utm_source=gold_browser_extension)



