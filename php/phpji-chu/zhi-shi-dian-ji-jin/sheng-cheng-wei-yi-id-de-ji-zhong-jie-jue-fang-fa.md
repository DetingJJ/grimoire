## 生成唯一id的集中方法

1.md5

这种方法有一定的概率会出现重复

```php
md5(time() . mt_rand(1,1000000));
```

2.php内置函数uniqid\(\)  
uniqid\(\) 函数基于以微秒计的当前时间，生成一个唯一的 ID。

> w3school参考手册有一句话:"由于基于系统时间，通过该函数生成的 ID 不是最佳的。如需生成绝对唯一的 ID，请使用 md5\(\) 函数"。

```php
/**
 * ${STATIC} uuid
 * @desc: 生产一个格式化的MD5
 * @return string [229E2799-C381-E833-26A7-C072D3565B54]
 */
function uuid() {
    if (function_exists('com_create_guid')) {
        return com_create_guid();
    } else {
        mt_srand((double)microtime() * 10000); //optional for php 4.2.0 and up.随便数播种，4.2.0以后不需要了。
        $charID = strtoupper(md5(uniqid(rand(), true))); //根据当前时间（微秒计）生成唯一id.
        $hyphen = chr(45); // "-"
        $uuid   = ''
            . substr($charID, 0, 8 )
            . $hyphen . substr($charID, 8, 4 )
            . $hyphen . substr( $charID, 12, 4 )
            . $hyphen . substr( $charID, 16, 4 )
            . $hyphen . substr( $charID, 20, 12 );
        return $uuid;
    }
}
```

网上查了下，有很多的方法

1、md5\(time\(\) . mt\_rand\(1,1000000\)\);

这种方法有一定的概率会出现重复

2、php内置函数uniqid\(\)

uniqid\(\) 函数基于以微秒计的当前时间，生成一个唯一的 ID.

w3school参考手册有一句话:"由于基于系统时间，通过该函数生成的 ID 不是最佳的。如需生成绝对唯一的 ID，请使用 md5\(\) 函数"。

下面方法返回结果类似：5DDB650F-4389-F4A9-A100-501EF1348872

function uuid\(\) {  
  if \(function\_exists \( 'com\_create\_guid' \)\) {  
    return com\_create\_guid \(\);  
  } else {  
    mt\_srand \( \( double \) microtime \(\) \* 10000 \); //optional for php 4.2.0 and up.随便数播种，4.2.0以后不需要了。  
    $charid = strtoupper \( md5 \( uniqid \( rand \(\), true \) \) \); //根据当前时间（微秒计）生成唯一id.  
    $hyphen = chr \( 45 \); // "-"  
    $uuid = '' . //chr\(123\)// "{"  
substr \( $charid, 0, 8 \) . $hyphen . substr \( $charid, 8, 4 \) . $hyphen . substr \( $charid, 12, 4 \) . $hyphen . substr \( $charid, 16, 4 \) . $hyphen . substr \( $charid, 20, 12 \);  
    //.chr\(125\);// "}"  
    return $uuid;  
  }  
}  
com\_create\_guid\(\)是php自带的生成唯一id方法，php5之后貌似已经没有了。  
3、官方uniqid\(\)参考手册有用户提供的方法，结果类似：{E2DFFFB3-571E-6CFC-4B5C-9FEDAAF2EFD7}

public function create\_guid\($namespace = ''\) {  
  static $guid = '';  
  $uid = uniqid\("", true\);  
  $data = $namespace;  
  $data .= $\_SERVER\['REQUEST\_TIME'\];  
  $data .= $\_SERVER\['HTTP\_USER\_AGENT'\];  
  $data .= $\_SERVER\['LOCAL\_ADDR'\];  
  $data .= $\_SERVER\['LOCAL\_PORT'\];  
  $data .= $\_SERVER\['REMOTE\_ADDR'\];  
  $data .= $\_SERVER\['REMOTE\_PORT'\];  
  $hash = strtoupper\(hash\('ripemd128', $uid . $guid . md5\($data\)\)\);  
  $guid = '{' .  
      substr\($hash, 0, 8\) .  
      '-' .  
      substr\($hash, 8, 4\) .  
      '-' .  
      substr\($hash, 12, 4\) .  
      '-' .  
      substr\($hash, 16, 4\) .  
      '-' .  
      substr\($hash, 20, 12\) .  
      '}';  
  return $guid;  
 }

