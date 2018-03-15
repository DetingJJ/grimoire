正则表达式是程序开发中一个重要的元素，它提供用来描述或匹配文本的字符串，如特定的字符、词或算式等。但在某些情况下，用正则表达式去验证一个字符串比较复杂和费时。本文为你介绍10种常见的实用PHP正则表达式的写法，希望对你的工作有所帮助。

![](/assets/import-正则表达式-2018年03月15日11:33:31.png)

**　　1. 验证E-mail地址**

这是一个用于验证电子邮件的正则表达式。但它并不是高效、完美的解决方案。在此不推荐使用。

```
$email = "test@ansoncheung.tk";
if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',$email)) {
    echo "Your email is ok.";
} else {
    echo "Wrong email address format";
}
```

为了更加有效验证电子邮件地址，推荐使用[filer\_var](http://php.net/manual/en/function.filter-var.php)。

```
if (filter_var('test+email@ansoncheung', FILTER_VALIDATE_EMAIL)) {
    echo "Your email is ok.";
} else {
    echo "Wrong email address format.";
}
```

**　　2. 验证用户名**

这是一个用于验证用户名的实例，其中包括字母、数字（A-Z，a-z，0-9）、下划线以及最低5个字符，最大20个字符。同时，也可以根据需要，对最小值和最大值做合理的修改。

```
$username = "user_name12";
if (preg_match('/^[a-z\d_]{5,20}$/i', $username)) {
    echo "Your username is ok.";
} else {
    echo "Wrong username format.";
}
```

**　　3. 验证电话号码**

这是一个验证美国电话号码的实例。

```
$phone = "(021)423-2323";
if (preg_match('/\(?\d{3}\)?[-\s.]?\d{3}[-\s.]\d{4}/x', $phone)) {
    echo "Your phone number is ok.";
} else {
    echo "Wrong phone number.";
}
```

**　　4. 验证IP地址**

这是一个用来验证IPv4地址的实例。

```
$IP = "198.168.1.78";
if (preg_match('/^(([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]).){3}([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/',$IP)) {
    echo "Your IP address is ok.";
} else {
    echo "Wrong IP address.";
}
```

**　　5. 验证邮政编码**

这是一个用来验证邮政编码的实例。

```
 $zipcode = "12345-5434";
 if (preg_match("/^([0-9]{5})(-[0-9]{4})?$/i",$zipcode)) {
 echo "Your Zip code is ok.";
 } else {
 echo "Wrong Zip code.";
 }
```

**　　6. 验证SSN（社会保险号）**

这是一个验证美国SSN的实例。

```
$ssn = "333-23-2329";
if (preg_match('/^[\d]{3}-[\d]{2}-[\d]{4}$/',$ssn)) {
    echo "Your SSN is ok.";
} else {
    echo "Wrong SSN.";
}
```

**　　7. 验证信用卡号**

```
$cc = "378282246310005";
if (preg_match('/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6011[0-9]{12}|3(?:0[0-5]|[68][0-9])[0-9]{11}|3[47][0-9]{13})$/', $cc)) {
    echo "Your credit card number is ok.";
} else {
    echo "Wrong credit card number.";
}
```

**　　8. 验证域名**

```
$url = "http://ansoncheung.tk/";
 if (preg_match('/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i', $url)) {
 echo "Your url is ok.";
 } else {
 echo "Wrong url.";
 }
```

**　　9. 从特定URL中提取域名**

```
$url = "http://ansoncheung.tk/articles";
 preg_match('@^(?:http://)?([^/]+)@i', $url, $matches);
 $host = $matches[1];
echo $host;
```

**　　10. 将文中关键词高亮显示**

```
$text = "Sample sentence from AnsonCheung.tk, regular expression has become popular in web programming. Now we learn regex. According to wikipedia, Regular expressions (abbreviated as regex or regexp, with plural forms regexes, regexps, or regexen) are written in a formal language that can be interpreted by a regular expression processor";
$text = preg_replace("/\b(regex)\b/i", '<span style="background:#5fc9f6">\1</span>', $text);
echo $text;
```

> 文章摘自：[https://www.oudahe.com/p/153/](https://www.oudahe.com/p/153/)
>
> 英文来源：[10-useful-php-regular-expression](http://www.ansoncheung.tk/articles/10-useful-php-regular-expression)



