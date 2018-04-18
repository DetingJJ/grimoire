preg\_replace\(\)

函数原型：mixed preg\_replace \(mixed $pattern, mixed $replacement, mixed $subject \[, int $limit\]\)

其前三个参数均可以使用数组；第四个参数$limit可以设置替换的次数，默认为全部替换。

```php
<?php 

//字符串 
$string = "Name: {Name}<br>/nEmail: {Email}<br>/nAddress: {Address}<br>/n"; 
//模式 
$patterns =array( 
    "/{Address}/", 
    "/{Name}/", 
    "/{Email}/" 
); 
//替换字串 
$replacements = array ( 
    "No.5, Wilson St., New York, U.S.A", 
    "Thomas Ching", 
    "tom@emailaddress.com", 
); 
//输出模式替换结果 
print preg_replace($patterns, $replacements, $string);
```

输出结果：

```
Name: Thomas Ching<br>/nEmail: tom@emailaddress.com<br>/nAddress: No.5, Wilson St., New York, U.S.A<br>/n
```

如果仅对字符串做简单的替换，可以使用str\_replace函数。

