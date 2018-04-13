## 1.将十进制数字转化为26进制用A-Z来表示

```php
/**
 * 将十进制数字转化为26进制用A-Z来表示
 * @param type $n
 * @return string
 */
function AZ26($n) {
    $letter = range('A', 'Z', 1);
    $s = '';
    while ($n > 0) {
        $m = $n % 26;
        if ($m == 0)
            $m = 26;
        $s = $letter[$m - 1] . $s;
        $n = ($n - $m) / 26;
    }
    return $s;
}
```

## 2. 十进制转二进制、八进制、十六进制 不足位数前面补零\*

从十进制向其它进制转换，用的是就用该数字不断除以要转换的进制数，读取余数。连接一起就可以了。下面是十进制转换为二进制、八进制、十六进制：

```php
<?php 
/**
 *十进制转二进制、八进制、十六进制 不足位数前面补零*
 *
 * @param array $datalist 传入数据array(100,123,130)
 * @param int $bin 转换的进制可以是：2,8,16
 * @return array 返回数据 array() 返回没有数据转换的格式
 * @copyright chengmo QQ:8292669
 */
function decto_bin($datalist,$bin)
{
    static $arr=array(0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F');
    if(!is_array($datalist)) $datalist=array($datalist);
    if($bin==10)return $datalist; //相同进制忽略
    $bytelen=ceil(16/$bin); //获得如果是$bin进制，一个字节的长度
    $aOutChar=array();
    foreach ($datalist as $num)
    {
        $t="";
        $num=intval($num);
        if($num===0) 
        {
            continue;
        }
        while($num>0)
        {
            $t=$arr[$num%$bin].$t;
            $num=floor($num/$bin);
        }
        $tlen=strlen($t);
        if($tlen%$bytelen!=0)
        {
            $pad_len=$bytelen-$tlen%$bytelen;
            $t=str_pad("",$pad_len,"0",STR_PAD_LEFT).$t; //不足一个字节长度，自动前面补充0
        }
        $aOutChar[]=$t;
    }
    return $aOutChar;
}
```

测试结果：

```php
var_dump(decto_bin(array(128,253),2));
var_dump(decto_bin(array(128,253),8));
var_dump(decto_bin(array(128,253),16));

X-Powered-By: PHP/5.2.0
Content-type: text/html
array(2) {
  [0]=>
  string(8) "10000000"
  [1]=>
  string(8) "11111101"
}
array(2) {
  [0]=>
  string(4) "0200"
  [1]=>
  string(4) "0375"
}
array(2) {
  [0]=>
  string(2) "80"
  [1]=>
  string(2) "FD"
}
```

## 3.二进制、八进制、十六进制转十进制用乘法

二进制、八进制、十六进制转十进制用乘法，如：1101 转十进制：1\*2^3+1\*2^2+0\*2^1+1\*2^0，程序设计如下：

```php
<?php 
/**
 *二进制、八进制、十六进制 转十进制*
 *
 * @param array $datalist 传入数据array(df,ef)
 * @param int $bin 转换的进制可以是：2,8,16
 * @return array 返回数据 array() 返回没有数据转换的格式
 * @copyright chengmo QQ:8292669
 */
function bin_todec($datalist,$bin)
{
    static $arr=array('0'=>0,'1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5,
    '6'=>6,'7'=>7,'8'=>8,'9'=>9,'A'=>10,'B'=>11,'C'=>12,'D'=>13,'E'=>14,'F'=>15);
    if(!is_array($datalist))$datalist=array($datalist);
    if($bin==10)return $datalist; //为10进制不转换
    $aOutData=array(); //定义输出保存数组
    foreach ($datalist as $num)
    {
        $atnum=str_split($num); //将字符串分割为单个字符数组
        $atlen=count($atnum);
        $total=0;
        $i=1;
        foreach ($atnum as $tv)
        {
            $tv=strtoupper($tv);

            if(array_key_exists($tv,$arr))
            {
                if($arr[$tv]==0)continue;
                $total=$total+$arr[$tv]*pow($bin,$atlen-$i);
            }
            $i++;
        }
        $aOutData[]=$total;
    }
    return $aOutData;
}
```

测试结果如下：

```php
var_dump(bin_todec(array('ff','ff33','cc33'),16));
var_dump(bin_todec(array('1101101','111101101'),2));
var_dump(bin_todec(array('1234123','12341'),8));

X-Powered-By: PHP/5.2.0
Content-type: text/html
array(3) {
  [0]=>
  int(255)
  [1]=>
  int(65331)
  [2]=>
  int(52275)
}
array(2) {
  [0]=>
  int(124)
  [1]=>
  int(508)
}
array(2) {
  [0]=>
  int(342099)
  [1]=>
  int(5345)
}
```



