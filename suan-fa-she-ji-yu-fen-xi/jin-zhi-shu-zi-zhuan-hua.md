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



