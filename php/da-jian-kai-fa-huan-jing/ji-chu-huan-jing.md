一些配置文件备注：

The php.ini and php-fpm.ini file can be found in:

```
/usr/local/etc/php/7.2/
```

To have launchd start php now and restart at login:

```
brew services start php
```

Or, if you don't want/need a background service you can just run:

```
php-fpm
```



