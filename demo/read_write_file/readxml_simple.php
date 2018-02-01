<?php

$xml_string="<?xml version='1.0'?>
<moleculedb>
    <molecule name='Benzine'>
        <symbol>ben</symbol>
        <code>A</code>
    </molecule>
    <molecule name='Water'>
        <symbol>h2o</symbol>
        <code>K</code>
    </molecule>
</moleculedb>";

//load the xml string using simplexml function
$xml = simplexml_load_string($xml_string);

//loop through the each node of molecule
foreach ($xml->molecule as $record)
{
   //attribute are accessted by
   echo $record['name'], '  ';
   //node are accessted by -> operator
   echo $record->symbol, '  ';
   echo $record->code, '<br />';
   var_dump($record);
}