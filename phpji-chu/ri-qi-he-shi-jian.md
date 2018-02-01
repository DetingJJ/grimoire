# 常用时间格式

```php
echo date('Y-m-d H:i:s');
$intTime = time();
echo date('Y-m-d H:i:s',$intTime);
echo(date("M-d-Y",mktime(0,0,0,12,3,2001)));
echo(date('y-m-d H:i:s', strtotime('+1 day')));
```

# 获取日期

```php
$dt = getdate();
$dt内容如下：
--------------------

array(11) {
  ["seconds"]=>
  int(16)
  ["minutes"]=>
  int(11)
  ["hours"]=>
  int(19)
  ["mday"]=>
  int(5)
  ["wday"]=>
  int(2)
  ["mon"]=>
  int(9)
  ["year"]=>
  int(2017)
  ["yday"]=>
  int(247)
  ["weekday"]=>
  string(7) "Tuesday"
  ["month"]=>
  string(9) "September"
  [0]=>
  int(1504609876)
}

构造新时间：
$intMinUpdateTime = mktime(intval($dt['hours']), intval($dt['minutes']) - 40, intval($dt['seconds']), intval($dt['mon']), intval($dt['mday']), intval($dt['year']));
```



