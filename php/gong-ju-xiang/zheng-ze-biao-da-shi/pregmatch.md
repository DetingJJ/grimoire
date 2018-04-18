`preg_match` 函数原型：`int preg_match (string $pattern, string $content [, array $matches])`

```php
<?php 

//需要匹配的字符串。date函数返回当前时间 
$content = "Current date and time is ".date("Y-m-d h:i a").", we are learning PHP together."; 
var_dump($content);
//使用通常的方法匹配时间 
if (preg_match ('/\d{4}-\d{2}-\d{2} \d{2}:\d{2} [ap]m/', $content, $m)) 
{ 
    echo "匹配的时间是：" .$m[0]. "\n"; 
} 

//由于时间的模式明显，也可以简单的匹配 
if (preg_match ("/([\d-]{10}) ([\d:]{5} [ap]m)/", $content, $m)) 
{ 
    echo "当前日期是：" .$m[1]. "\n"; 
    echo "当前时间是：" .$m[2]. "\n"; 
}

```



