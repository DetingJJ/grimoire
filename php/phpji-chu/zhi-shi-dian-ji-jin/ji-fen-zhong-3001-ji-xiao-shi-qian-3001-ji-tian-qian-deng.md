几分钟、几小时前、几天前等，效果如下：

```
刚刚
1秒前
1分前
1小时前
1天前
1月前
1年前
10年前

now
1 seconds ago
1 minutes ago
1 hours ago
1 days ago
1 months ago
1 years ago
10 years ago
```

 

废话少说，直接上代码：

```php
<?php

class CTools {
    const ONE_MIN      = 60;
    const ONE_HOUR     = self::ONE_MIN  * 60;
    const ONE_DAY      = self::ONE_HOUR * 24;
    const ONE_MONTH    = self::ONE_DAY  * 30; // 简化，按每月30天计
    const ONE_YEAR     = self::ONE_DAY  * 365;

    const LAN_EN       = 'en';
    const LAN_CN       = 'cn';

    const TIPS_NOW     = 'tips_now';
    const TIPS_SECOND  = 'tips_second';
    const TIPS_MIN     = 'tips_min';
    const TIPS_HOUR    = 'tips_hour';
    const TIPS_DAY     = 'tips_day';
    const TIPS_MONTH   = 'tips_month';
    const TIPS_YEAR    = 'tips_year';

    const TIPS_AGO     = 'tips_ago';

    static $tips       = array(
        self::LAN_CN => array(
            self::TIPS_NOW      => '刚刚',
            self::TIPS_SECOND   => '秒',
            self::TIPS_MIN      => '分',
            self::TIPS_HOUR     => '小时',
            self::TIPS_DAY      => '天',
            self::TIPS_MONTH    => '月',
            self::TIPS_YEAR     => '年',

            self::TIPS_AGO      => '前',
        ),
        self::LAN_EN => array(
            self::TIPS_NOW      => 'now',
            self::TIPS_SECOND   => ' seconds',
            self::TIPS_MIN      => ' minutes',
            self::TIPS_HOUR     => ' hours',
            self::TIPS_DAY      => ' days',
            self::TIPS_MONTH    => ' months',
            self::TIPS_YEAR     => ' years',

            self::TIPS_AGO      => ' ago',
        ),
    );

    /**
     * makePrettifyTime
     * @desc:
     * @param $intTime
     * @param string $intLan
     * @return string
     */
    public function makePrettifyTime($intTime, $intLan = self::LAN_CN) {
        $strPrettyTime = '';
        if(empty($intTime) || !is_numeric($intTime) || !isset(self::$tips[$intLan])){
            return $strPrettyTime;
        }

        $intDlt = time() - intval($intTime);
        if ($intDlt <= 0) {
            $strPrettyTime = self::$tips[$intLan][self::TIPS_NOW];
        } else if ($intDlt < self::ONE_MIN) {
            $strPrettyTime = $intDlt . self::$tips[$intLan][self::TIPS_SECOND] . self::$tips[$intLan][self::TIPS_AGO];
        } else if ($intDlt < self::ONE_HOUR) {
            $strPrettyTime = floor($intDlt / (self::ONE_MIN)) . self::$tips[$intLan][self::TIPS_MIN] . self::$tips[$intLan][self::TIPS_AGO];
        } else if ($intDlt < self::ONE_DAY) {
            $strPrettyTime = floor($intDlt / (self::ONE_HOUR)) . self::$tips[$intLan][self::TIPS_HOUR] . self::$tips[$intLan][self::TIPS_AGO];
        } else if ($intDlt < self::ONE_MONTH) {
            $strPrettyTime = floor($intDlt / (self::ONE_DAY)) . self::$tips[$intLan][self::TIPS_DAY] . self::$tips[$intLan][self::TIPS_AGO];
        } else if ($intDlt < self::ONE_YEAR) {
            $strPrettyTime = floor($intDlt / (self::ONE_MONTH)) . self::$tips[$intLan][self::TIPS_MONTH] . self::$tips[$intLan][self::TIPS_AGO];
        } else {
            $strPrettyTime = floor($intDlt / (self::ONE_YEAR)) . self::$tips[$intLan][self::TIPS_YEAR] . self::$tips[$intLan][self::TIPS_AGO];
        }

        return $strPrettyTime;
    }

}


$obj = new CTools();

$intLan = CTools::LAN_EN;
$intLan = CTools::LAN_CN;

$intTime = time(); // now
$strPrettyTime = $obj->makePrettifyTime($intTime, $intLan);
echo $strPrettyTime , "\n";

$intTime = time() - 1; // seconds ago
$strPrettyTime = $obj->makePrettifyTime($intTime, $intLan);
echo $strPrettyTime , "\n";

$intTime = time() - 60; // minutes ago
$strPrettyTime = $obj->makePrettifyTime($intTime, $intLan);
echo $strPrettyTime , "\n";

$intTime = time() - 60 * 60; // hours ago
$strPrettyTime = $obj->makePrettifyTime($intTime, $intLan);
echo $strPrettyTime , "\n";

$intTime = time() - 60 * 60 * 24; // hours ago
$strPrettyTime = $obj->makePrettifyTime($intTime, $intLan);
echo $strPrettyTime , "\n";

$intTime = time() - 60 * 60 * 24 * 30; // month ago
$strPrettyTime = $obj->makePrettifyTime($intTime, $intLan);
echo $strPrettyTime , "\n";

$intTime = time() - 60 * 60 * 24 * 365; // month ago
$strPrettyTime = $obj->makePrettifyTime($intTime, $intLan);
echo $strPrettyTime , "\n";

$intTime = time() - 60 * 60 * 24 * 365 * 10; // month ago
$strPrettyTime = $obj->makePrettifyTime($intTime, $intLan);
echo $strPrettyTime , "\n";

/*
 * output
刚刚
1秒前
1分前
1小时前
1天前
1月前
1年前
10年前



now
1 seconds ago
1 minutes ago
1 hours ago
1 days ago
1 months ago
1 years ago
10 years ago
 */
```



