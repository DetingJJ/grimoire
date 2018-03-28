命名风格转换，驼峰&下划线互相转换，支持递归层次（直接撸代码）。

```php
<?php
/**
 * Created by PhpStorm.
 * User: liangyuanzheng
 * Date: 3/28/17
 * Time: 20:24
 * Desc: 命名风格转换，驼峰&下划线互相转换，支持递归层次
 */

class CNamingStyleConvert
{
    static $arrExceptKeyList = array(
        'ext',
    );

    /**
     * CNamingStyleConvert constructor.
     */
    public function __construct()
    {

    }

    /**
     * static superCamel
     * @desc:
     * @param $unCamel
     * @param bool $bKeepOldKV 【为true时】表示保持旧key、value的对应关系
     * @param int $intDepth    【-1】表示无限层级转换，【0】不转换，【n >= 1】n层转换
     * @param string $separator【分隔符】
     * @return array
     */
    static public function superCamel($unCamel, $bKeepOldKV = true, $intDepth = -1, $separator='_')
    {
        if ($intDepth == 0) {
            return $unCamel;
        }
        if (is_array($unCamel)) {
            $ans = array();
            foreach ($unCamel as $k => $v) {
                if (in_array($k, self::$arrExceptKeyList)) {
                    $ans[$k] = $v;
                    continue;
                }

                $newK = self::_camel($k, $separator);
                if ($newK != $k && $bKeepOldKV) {
                    $ans[$k] = $v;
                }
                $ans[$newK] = self::superCamel($v, $bKeepOldKV, $intDepth - 1, $separator);
            }
            return $ans;
        } else {
            return $unCamel;
        }
    }

    /**
     * static superUnCamel
     * @desc:
     * @param $camel
     * @param bool $bKeepOldKV 【为true时】表示保持旧key、value的对应关系
     * @param int $intDepth    【-1】表示无限层级转换，【0】不转换，【n >= 1】n层转换
     * @param string $separator【分隔符】
     * @return array
     */
    static public function superUnCamel($camel, $bKeepOldKV = true, $intDepth = -1, $separator='_')
    {
        if ($intDepth == 0) {
            return $camel;
        }
        if (is_array($camel)) {
            $ans = array();
            foreach ($camel as $k => $v) {
                if (in_array($k, self::$arrExceptKeyList)) {
                    $ans[$k] = $v;
                    continue;
                }

                $newK = self::_unCamel($k, $separator);
                if ($newK != $k && $bKeepOldKV) {
                    $ans[$k] = $v;
                }
                $ans[$newK] = self::superUnCamel($v, $bKeepOldKV, $intDepth - 1, $separator);
            }
            return $ans;
        } else {
            return $camel;
        }
    }

    /**
     * static _camel
     * @desc: 下划线转驼峰
     * @param $unCamelWord
     * @param string $separator
     * @return string
     */
    static private function _camel($unCamelWord, $separator)
    {
        $unCamelWord = $separator. str_replace($separator, " ", strtolower($unCamelWord));
        return ltrim(str_replace(" ", "", ucwords($unCamelWord)), $separator );
    }

    /**
     * static _unCamel
     * @desc: 驼峰转下划线
     * @param $camelWord
     * @param string $separator
     * @return string
     */
    static private function _unCamel($camelWord, $separator)
    {
        return strtolower(preg_replace('/([a-z])([A-Z])/', "$1" . $separator . "$2", $camelWord));
    }



}

$objNamConv = new CNamingStyleConvert();

$arr = array(
    'a_b_c' => 'x_y_z',
    'ext'   => array(
        'a_b' => 'ext_a_b'
    ),
);

/**
$arrCamel = CNamingStyleConvert::superCamel($arr, false);

print_r($arrCamel);

*/
```

转换后输出：

```
Array
(
    [aBC] => x_y_z
    [ext] => Array
        (
            [a_b] => ext_a_b
        )

)
```



