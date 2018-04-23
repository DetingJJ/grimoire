## 读取xml内容

**xml内容：**

```
<?xml version="1.0" encoding="UTF-8"?>
<methodResponse>
    <params>
        <param>
            <value>
                <int>0</int>
            </value>
        </param>
    </params>
</methodResponse>
```

**解析：**

```
$xml = simplexml_load_string($strXml);
    $result = $xml->xpath("/methodResponse/params/param/value/int");
    $intRet = -1;
    while(list( , $node) = each($result)) {
        echo 'value is: ',$node,"\n";
        $intRet = $node;
    }
```

**结果：**

```
value is: 0
```



