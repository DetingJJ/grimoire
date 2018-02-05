**1.读文件**

1.1直接读取文件内容

```php
$myfile = file('./data/testfile.csv');

foreach($myfile as $row)
{
    print_r($row);
}
```

1.2按行读取文件内容

```php
$myfile = fopen('./data/testfile.csv', 'r');

while(!feof($myfile))
{
    echo fgets($myfile);
}

fclose($myfile);
```

**2.写文件\(csv格式\)**

```php
$fileName = './data/testfilewrite.csv';
$myfile = fopen($fileName, 'w');

$data = array(
    'id',
    'name',
    'email',
);

fputcsv($myfile, $data);

$ct = 10;
do
{
    $data = array(
        'id'.strval($ct),
        'name'.strval($ct),
        'email@domail.com'.strval($ct),
    );
    fputcsv($myfile, $data);
}while($ct-- > 0);

fclose($myfile);
```



