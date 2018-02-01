<?php

// 
// 可以通过设置样式，发送html页面。
function send_mail($to,$subject,$body)
{
$headers = "From: KOONK\r\n";
$headers .= "Reply-To: blog@koonk.com\r\n";
$headers .= "Return-Path: blog@koonk.com\r\n";
$headers .= "X-Mailer: PHP5\n";
$headers .= 'MIME-Version: 1.0' . "\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$ret = mail($to,$subject,$body,$headers);
var_dump($ret);
}

$to = "liangyzteam@163.com";
$subject = "This is a test mail";
$body = "Hello World!";
send_mail($to,$subject,$body);
