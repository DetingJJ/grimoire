实现对Excel文件的读写，以及样式修改。

```php

/**
 * ${STATIC} save_as_xls_2007_later
 * @desc:
 * @param $filePathXlsx
 * @param $arrHeader
 * @param $arrData
 * @param string $strSheetName
 */
function save_as_xls_2007_later($filePathXlsx, $arrHeader, $arrData, $strSheetName = 'sheet') {
    // 一下两个文件，根据实际路径做修改
    require_once '../../Classes/PHPExcel.php';
    require_once '../../Classes/PHPExcel/Writer/Excel2007.php';

    // 创建一个excel
    $objPHPExcel = new PHPExcel();

    // 设置当前sheet
    $objPHPExcel->setActiveSheetIndex(0);
    // 设置shell的name
    if (!empty($strSheetName)) {
        $objPHPExcel->getActiveSheet()->setTitle($strSheetName);
    }

    // 保存header
    $intRowNum = 1;
    $intColNum = 1;
    foreach ($arrHeader as $vHeader) {
        $objPHPExcel->getActiveSheet()->setCellValue(cell_name(AZ26($intColNum), $intRowNum), $vHeader);
        $intColNum++;
    }

    // 保存数据
    foreach ($arrData as $vRow) {
        $intRowNum++;
        $intColNum = 1;
        foreach ($vRow as $vvData) {
            $objPHPExcel->getActiveSheet()->setCellValue(cell_name(AZ26($intColNum), $intRowNum), $vvData);
            $intColNum++;
        }
    }

    // 保存为2007格式
    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $objWriter->save($filePathXlsx);
}


/**
 * ${STATIC} AZ26
 * @desc: 将十进制数字转化为26进制用A-Z来表示
 * @param $n
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

/**
 * ${STATIC} cell_name
 * @desc:
 * @param $strColName
 * @param $intRowNum
 * @return string
 */
function cell_name($strColName, $intRowNum) {
    return $strColName . $intRowNum;
}
```





> PHPExcel参考手册：
>
> [http://www.mamicode.com/info-detail-470193.html](http://www.mamicode.com/info-detail-470193.html)
>
> [http://www.cnblogs.com/freespider/p/3284828.html](http://www.cnblogs.com/freespider/p/3284828.html)
>
> [http://www.jquerycn.cn/a\_17115](http://www.jquerycn.cn/a_17115)



