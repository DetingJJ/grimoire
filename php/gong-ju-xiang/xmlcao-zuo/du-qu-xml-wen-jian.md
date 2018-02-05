使用 DOM 库读取 XML内容，并输出。

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

用 DOM 读取图书 XML：

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



