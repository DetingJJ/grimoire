<?php

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



