读取 XML 的另一种方法是使用 XML Simple API（SAX）解析器。PHP 的大多数安装都包含 SAX 解析器。SAX 解析器运行在回调模型上。每次打开或关闭一个标记时，或者每次解析器看到文本时，就用节点或文本的信息回调用户定义的函数。

SAX 解析器的优点是，它是真正轻量级的。解析器不会在内存中长期保持内容，所以可以用于非常巨大的文件。缺点是编写 SAX 解析器回调是件非常麻烦的事。

xml文件内容：

```xml
<books>
    <book>
        <author>Jack Herrington</author>
        <title>PHP Hacks</title>
        <publisher>O'Reilly</publisher>
    </book>
    <book>
        <author>Jack Herrington</author>
        <title>Podcasting Hacks</title>
        <publisher>O'Reilly</publisher>
    </book>
</books>
```

用 SAX 解析器读取图书 XML：

&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;

```php
$doc = new DOMDocument();
$doc->load('books.xml');

$books = $doc->getElementsByTagName("book");

foreach($books as $book)
{
    $authors = $book->getElementsByTagName( "author" );
    $author = $authors->item(0)->nodeValue;

    $publishers = $book->getElementsByTagName( "publisher" );
    $publisher = $publishers->item(0)->nodeValue;

    $titles = $book->getElementsByTagName( "title" );
    $title = $titles->item(0)->nodeValue;

    echo "$title - $author - $publisher\n";
}
```

我们首先创建一个DOMDocument对象$doc，通过方法load加载xml文件内容到对象$doc。通过方法getElementsByTagName得到节点名为book的所有子节点。

在foreach循环中，同样是通过方法getElementsByTagName选取指定节点author、publisher、title，通过nodeValue取得节点的值。

执行结果：

```
PHP Hacks - Jack Herrington - O'Reilly
Podcasting Hacks - Jack Herrington - O'Reilly
```



