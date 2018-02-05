url处理函数，得到URL部分

```php
urldecode();
urlencode();
```

```php
$test = pathinfo("http://localhost/index.php");    
print_r($test); 
Array
(
    [dirname] => http://localhost
    [basename] => index.php
    [extension] => php
    [filename] => index
)

$test = parse_url("http://localhost/index.php?name=tank&sex=1#top");    
print_r($test); 
Array
(
    [scheme] => http
    [host] => localhost
    [path] => /index.php
    [query] => name=tank&sex=1
    [fragment] => top
)


$test = basename("http://localhost/index.php?name=tank&sex=1#top");    
echo $test;  
index.php?name=tank&sex=1#top
```



