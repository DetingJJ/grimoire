**生成二维码：**

PHPqrCode是一个PHP二维码生成类库，利用它可以轻松生成二维码，官网提供了下载和多个演示demo，查看地址：[http://phpqrcode.sourceforge.net](#)

下载官网提供的类库后，只需要使用phpqrcode.php就可以生成二维码了，当然您的

PHP环境必须开启支持GD2。 phpqrcode.php提供了一个关键的png\(\)方法，其中参数$text表示生成二位的的信息文本；参数$outfile表示是否输出二维码图片 文件，默认否；参数$level表示容错率，也就是有被覆盖的区域还能识别，分别是 L（QR\_ECLEVEL\_L，7%），M（QR\_ECLEVEL\_M，15%），Q（QR\_ECLEVEL\_Q，25%），H（QR\_ECLEVEL\_H，30%）； 参数$size表示生成图片大小，默认是3；参数$margin表示二维码周围边框空白区域间距值；参数$saveandprint表示是否保存二维码并 显示。

调用PHP qrCode非常简单，如下代码即可生成一张内容为 [http://www.learnphp.cn](http://www.learnphp.cn)，的二维码。

Php代码

```php
include 'phpqrcode.php';
QRcode::png('http://www.learnphp.cn');
```

那么实际应用中，我们会在二维码的中间加上自己的LOGO，已增强宣传效果。那如何生成含有logo的二维码呢？其实原理很简单，先使用PHP qr Code生成一张二维码图片，然后再利用php的image相关函数，将事先准备好的logo图片加入到刚生成的原始二维码图片中间，然后重新生成一张新 的二维码图片。

```php
<?php 
include 'phpqrcode.php'; 
$value = 'http://www.learnphp.cn'; //二维码内容 
$errorCorrectionLevel = 'L';//容错级别 
$matrixPointSize = 6;//生成图片大小 
//生成二维码图片 
QRcode::png($value, 'qrcode.png', $errorCorrectionLevel, $matrixPointSize, 2); 
$logo = 'logo.png';//准备好的logo图片 
$QR = 'qrcode.png';//已经生成的原始二维码图 

if ($logo !== FALSE) { 
 $QR = imagecreatefromstring(file_get_contents($QR)); 
 $logo = imagecreatefromstring(file_get_contents($logo)); 
 $QR_width = imagesx($QR);//二维码图片宽度 
 $QR_height = imagesy($QR);//二维码图片高度 
 $logo_width = imagesx($logo);//logo图片宽度 
 $logo_height = imagesy($logo);//logo图片高度 
 $logo_qr_width = $QR_width / 5; 
 $scale = $logo_width/$logo_qr_width; 
 $logo_qr_height = $logo_height/$scale; 
 $from_width = ($QR_width - $logo_qr_width) / 2; 
 //重新组合图片并调整大小 
 imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width, 
 $logo_qr_height, $logo_width, $logo_height); 
} 
//输出图片 
imagepng($QR, 'helloweba.png'); 
echo '<img src="helloweba.png">'; 
?>
```



