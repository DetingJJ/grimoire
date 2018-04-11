本节主要记录了Nginx相关的一些配置，即nginx.conf。

我的配置文件路径（两个不同版本的配置）：

/usr/local/etc/nginx/nginx.conf（目前这个配置全一点，启用的也是这个配置）

/usr/local/nginx/conf/nginx.conf

nginx 配置示例

```
server {
    listen       80;
    server_name www.lyz.com;

    # 该项要修改为你准备存放相关网页的路径
    root /usr/local/var/www/DouPHP_1_3_Release_20171002/;

    location / {
        index index.php;
#        autoindex on;
    }

    #proxy the php scripts to php-fpm
    location ~ \.php$ {
        include /usr/local/etc/nginx/fastcgi.conf;
        fastcgi_intercept_errors on;
        fastcgi_pass   127.0.0.1:9000;
        include     fastcgi_params;
    }

}
```

修改权限脚本：

```

```



