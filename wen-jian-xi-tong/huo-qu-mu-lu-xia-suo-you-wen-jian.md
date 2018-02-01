获取指定目录下所有文件全路径（方式1）：

```php
    /**
     * _getFileList
     * @desc: 获取目录目录下文件的全路径，支持例外文件
     * @param $strFullPath
     * @param array $arrExceptFileName
     * @return array|bool
     */
    private function _getFileList($strFullPath, $arrExceptFileName = array('.', '..')) {
        if (!is_dir($strFullPath)) {
            return false;
        }

        $arrFileName = array();
        $objDir = opendir($strFullPath);

        while ($fileName = readdir($objDir)) {
            if (in_array($fileName, $arrExceptFileName)) {
                continue;
            }

            $arrFileName[] = $strFullPath . '/' . $fileName;
        }
        closedir($objDir);

        return $arrFileName;
    }
```

递归获取目录下所有文件全路径（方式2）：

```php
<?php

function recur_dir($path) {
    $arrFileList = array();
    $lst = scandir($path);
    foreach($lst as $key => $value) {
        if($value == '.' || $value == '..') {
            continue;
        }
        $value = $path.'/'.$value;
        if(is_dir($value)){
            $arrFileList = array_merge($arrFileList, recur_dir($value));
        } else {
            $arrFileList[] = $value;
        }
    }
    return $arrFileList;
}

$baseDir = '..';

$arrFileList = recur_dir($baseDir);
print_r($arrFileList);
```



