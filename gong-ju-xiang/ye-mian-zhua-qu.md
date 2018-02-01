使用curl实现页面、接口返回数据的抓取，类定义如下：

```php
<?php

header('Content-Type:application/json;charset=UTF-8');

class HttpHelper{

    public function __construct() {

    }

    static public function request_by_curl_get($remote_server)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $remote_server);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        $rt = curl_exec($ch);
        curl_close($ch);
        // echo $rt;
        return $rt;
    }

    static public function request_by_curl_post($remote_server, $data) {
        $post_data = json_encode($data);
        //echo $post_data;

        //var_dump($this->data);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $remote_server);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:application/json;charset=UTF-8;"));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_TIMEOUT,60);  //定义超时60秒钟

        $rt = curl_exec($ch);
        curl_close($ch);

        //echo $rt;
        return $rt;
    }

};
```

接口数据抓取例子：

```php
// 获取页面
$url = 'http://www.baidu.com';
$ans = HttpHelper::request_by_curl_get($url);
var_dump('---------------------');
echo($ans);

// 获取json接口数据
var_dump('---------------------');
$url = 'http://gc.ditu.aliyun.com/regeocoding?l=39.938133,116.395739&type=001';
$ans = HttpHelper::request_by_curl_get($url);
$arrAns = json_decode($ans, true);
var_dump($arrAns);
```



