文件系统

```php
$ret = file_put_contents($file, $content, FILE_APPEND);
$content = file_get_contents($file);
```

文件上传：

$\_FILES保存上传到服务端的文件。

文件扩展名

```php
pathinfo($file, PATHINFO_EXTENSION);
$fileInfo = pathinfo($file);

array(4) {
  ["dirname"]=>
  string(1) "."
  ["basename"]=>
  string(10) "a.b.tar.gz"
  ["extension"]=>
  string(2) "gz"
  ["filename"]=>
  string(7) "a.b.tar"
}
```



