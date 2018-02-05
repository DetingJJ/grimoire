# 1.安装

上一节我们搞好了Nginx，那么这一节我们来搞一搞php和php-fpm

运行命令：sudo apt-get -y install php5 php5-fpm php5-cli

```
leunggeorge@ubuntu14:~$ sudo apt-get -y install php5 php5-fpm php5-cli
Reading package lists... Done
Building dependency tree       
Reading state information... Done
The following packages were automatically installed and are no longer required:
  fcitx-frontend-gtk2:i386 fcitx-frontend-gtk3:i386 fcitx-frontend-qt4:i386
  fcitx-libs:i386 fcitx-libs-gclient:i386 fcitx-libs-qt:i386 gcc-4.8-base:i386
  libasound2:i386 libatk-bridge2.0-0:i386 libatk1.0-0:i386 libatspi2.0-0:i386
  libaudio2:i386 libavahi-client3:i386 libavahi-common-data:i386
  libavahi-common3:i386 libcairo-gobject2:i386 libcairo2:i386
  libcanberra-gtk3-0:i386 libcanberra-gtk3-module:i386 libcanberra0:i386
  libcolord1:i386 libcups2:i386 libdatrie1:i386 libexpat1:i386 libffi6:i386
  libfontconfig1:i386 libfreetype6:i386 libgcrypt11:i386
  libgdk-pixbuf2.0-0:i386 libglib2.0-0:i386 libgnutls26:i386
  libgpg-error0:i386 libgraphite2-3:i386 libgssapi-krb5-2:i386 libgtk-3-0:i386
  libgtk2.0-0:i386 libharfbuzz0b:i386 libice6:i386 libidn11:i386
  libjasper1:i386 libjbig0:i386 libjpeg-turbo8:i386 libjpeg8:i386
  libk5crypto3:i386 libkeyutils1:i386 libkrb5-3:i386 libkrb5support0:i386
  liblcms2-2:i386 libltdl7:i386 libmysqlclient18:i386 libnotify4:i386
  libogg0:i386 libopencc1:i386 libp11-kit0:i386 libpango-1.0-0:i386
  libpangocairo-1.0-0:i386 libpangoft2-1.0-0:i386 libpixman-1-0:i386
  libqt4-dbus:i386 libqt4-declarative:i386 libqt4-network:i386
  libqt4-script:i386 libqt4-sql:i386 libqt4-sql-mysql:i386 libqt4-xml:i386
  libqt4-xmlpatterns:i386 libqtcore4:i386 libqtdbus4:i386 libqtgui4:i386
  libsm6:i386 libstdc++6:i386 libtasn1-6:i386 libtdb1:i386 libthai0:i386
  libtiff5:i386 libvorbis0a:i386 libvorbisfile3:i386 libwayland-client0:i386
  libwayland-cursor0:i386 libx11-6:i386 libxau6:i386 libxcb-render0:i386
  libxcb-shm0:i386 libxcb1:i386 libxcomposite1:i386 libxcursor1:i386
  libxdamage1:i386 libxdmcp6:i386 libxext6:i386 libxfixes3:i386 libxi6:i386
  libxinerama1:i386 libxkbcommon0:i386 libxrandr2:i386 libxrender1:i386
  libxt6:i386 mysql-common notification-daemon:i386
Use 'apt-get autoremove' to remove them.
The following extra packages will be installed:
  php5-common php5-json php5-readline
Suggested packages:
  php-pear php5-user-cache
The following NEW packages will be installed:
  php5 php5-cli php5-common php5-fpm php5-json php5-readline
0 upgraded, 6 newly installed, 0 to remove and 378 not upgraded.
Need to get 4,855 kB of archives.
After this operation, 19.8 MB of additional disk space will be used.
Get:1 http://cn.archive.ubuntu.com/ubuntu/ trusty/main php5-json amd64 1.3.2-2build1 [34.4 kB]
Get:2 http://cn.archive.ubuntu.com/ubuntu/ trusty-updates/main php5-common amd64 5.5.9+dfsg-1ubuntu4.21 [448 kB]
Get:3 http://cn.archive.ubuntu.com/ubuntu/ trusty-updates/universe php5-fpm amd64 5.5.9+dfsg-1ubuntu4.21 [2,193 kB]
Get:4 http://cn.archive.ubuntu.com/ubuntu/ trusty-updates/main php5-cli amd64 5.5.9+dfsg-1ubuntu4.21 [2,166 kB]
Get:5 http://cn.archive.ubuntu.com/ubuntu/ trusty-updates/main php5-readline amd64 5.5.9+dfsg-1ubuntu4.21 [12.1 kB]
Get:6 http://cn.archive.ubuntu.com/ubuntu/ trusty-updates/main php5 all 5.5.9+dfsg-1ubuntu4.21 [1,300 B]
Fetched 4,855 kB in 6s (715 kB/s)                                              
Selecting previously unselected package php5-json.
(Reading database ... 170109 files and directories currently installed.)
Preparing to unpack .../php5-json_1.3.2-2build1_amd64.deb ...
Unpacking php5-json (1.3.2-2build1) ...
Selecting previously unselected package php5-common.
Preparing to unpack .../php5-common_5.5.9+dfsg-1ubuntu4.21_amd64.deb ...
Unpacking php5-common (5.5.9+dfsg-1ubuntu4.21) ...
Selecting previously unselected package php5-fpm.
Preparing to unpack .../php5-fpm_5.5.9+dfsg-1ubuntu4.21_amd64.deb ...
Unpacking php5-fpm (5.5.9+dfsg-1ubuntu4.21) ...
Selecting previously unselected package php5-cli.
Preparing to unpack .../php5-cli_5.5.9+dfsg-1ubuntu4.21_amd64.deb ...
Unpacking php5-cli (5.5.9+dfsg-1ubuntu4.21) ...
Selecting previously unselected package php5-readline.
Preparing to unpack .../php5-readline_5.5.9+dfsg-1ubuntu4.21_amd64.deb ...
Unpacking php5-readline (5.5.9+dfsg-1ubuntu4.21) ...
Selecting previously unselected package php5.
Preparing to unpack .../php5_5.5.9+dfsg-1ubuntu4.21_all.deb ...
Unpacking php5 (5.5.9+dfsg-1ubuntu4.21) ...
Processing triggers for ureadahead (0.100.0-16) ...
ureadahead will be reprofiled on next reboot
Processing triggers for man-db (2.6.7.1-1ubuntu1) ...
Setting up php5-common (5.5.9+dfsg-1ubuntu4.21) ...

Creating config file /etc/php5/mods-available/pdo.ini with new version
php5_invoke: Enable module pdo for cli SAPI
php5_invoke: Enable module pdo for fpm SAPI

Creating config file /etc/php5/mods-available/opcache.ini with new version
php5_invoke: Enable module opcache for cli SAPI
php5_invoke: Enable module opcache for fpm SAPI
Setting up php5-fpm (5.5.9+dfsg-1ubuntu4.21) ...

Creating config file /etc/php5/fpm/php.ini with new version
php5_invoke pdo: already enabled for fpm SAPI
php5_invoke opcache: already enabled for fpm SAPI
php5-fpm start/running, process 4909
Setting up php5-cli (5.5.9+dfsg-1ubuntu4.21) ...
update-alternatives: using /usr/bin/php5 to provide /usr/bin/php (php) in auto mode

Creating config file /etc/php5/cli/php.ini with new version
php5_invoke pdo: already enabled for cli SAPI
php5_invoke opcache: already enabled for cli SAPI
Setting up php5-readline (5.5.9+dfsg-1ubuntu4.21) ...

Creating config file /etc/php5/mods-available/readline.ini with new version
php5_invoke: Enable module readline for cli SAPI
php5_invoke: Enable module readline for fpm SAPI
Setting up php5-json (1.3.2-2build1) ...
php5_invoke: Enable module json for cli SAPI
php5_invoke: Enable module json for fpm SAPI
Processing triggers for ureadahead (0.100.0-16) ...
Setting up php5 (5.5.9+dfsg-1ubuntu4.21) ...
Processing triggers for php5-fpm (5.5.9+dfsg-1ubuntu4.21) ...
php5-fpm stop/waiting
php5-fpm start/running, process 5375
```

查看安装的php版本

php -v

```
PHP 5.5.9-1ubuntu4.21 (cli) (built: Feb  9 2017 20:54:58) 
Copyright (c) 1997-2014 The PHP Group
Zend Engine v2.5.0, Copyright (c) 1998-2014 Zend Technologies
    with Zend OPcache v7.0.3, Copyright (c) 1999-2014, by Zend Technologies
```

# 2.Nginx与php-fpm集成

到此为止，Nginx与php都已经安装完成了，本小节我们将完成Nginx与php的集成。其实nginx与php集成是通过fastcgi来实现，而fastcgi我们一般使用的是php-fpm。

php-fpm与nginx通信方式有两种，一种是TCP方式，一种是unix socket方式。

TCP方式就是使用TCP端口连接，一般是127.0.0.1:9000。

Socket是使用unix domain socket连接套接字/dev/shm/php-cgi.sock\(很多教程使用路径/tmp，而路径/dev/shm是个tmpfs，速度比磁盘快得多\)，在服务器压力不大的情况下，tcp和socket差别不大，但是在压力比较满的时候，使用套接字方式，效果确实比较好。

修改root配置（修改后如下）：

sudo vi /etc/nginx/sites-available/default

```
    root /var/www;
```

## 2.1 TCP方式

修改后的location配置：

```
    location ~ \.php$ {
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        # NOTE: You should have "cgi.fix_pathinfo = 0;" in php.ini

        # With php5-cgi alone:
        fastcgi_pass 127.0.0.1:9000;
        # With php5-fpm:
        # fastcgi_pass unix:/var/run/php5-fpm.sock;
        fastcgi_index index.php;
        include fastcgi_params;
    }
```

接下来在修改nginx的fastcgi\_params文件（这个命令一定要添加，否则nginx与php集成后，网页会显示空白）：

sudo vi /etc/nginx/fastcgi\_params

```
fastcgi_param    QUERY_STRING        $query_string;
fastcgi_param    REQUEST_METHOD        $request_method;
fastcgi_param    CONTENT_TYPE        $content_type;
fastcgi_param    CONTENT_LENGTH        $content_length;

fastcgi_param    SCRIPT_FILENAME        $request_filename;
fastcgi_param    SCRIPT_NAME        $fastcgi_script_name;
fastcgi_param    REQUEST_URI        $request_uri;
fastcgi_param    DOCUMENT_URI        $document_uri;
fastcgi_param    DOCUMENT_ROOT        $document_root;
fastcgi_param    SERVER_PROTOCOL        $server_protocol;

fastcgi_param    GATEWAY_INTERFACE    CGI/1.1;
fastcgi_param    SERVER_SOFTWARE        nginx/$nginx_version;

fastcgi_param    REMOTE_ADDR        $remote_addr;
fastcgi_param    REMOTE_PORT        $remote_port;
fastcgi_param    SERVER_ADDR        $server_addr;
fastcgi_param    SERVER_PORT        $server_port;
fastcgi_param    SERVER_NAME        $server_name;

fastcgi_param    HTTPS            $https if_not_empty;

fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;

# PHP only, required if PHP was built with --enable-force-cgi-redirect
fastcgi_param    REDIRECT_STATUS        200;
```

接下来我们修改php.ini配置（原来配置为;cgi.fix\_pathinfo=1）：

```
; cgi.fix_pathinfo provides *real* PATH_INFO/PATH_TRANSLATED support for CGI.  PHP's
; previous behaviour was to set PATH_TRANSLATED to SCRIPT_FILENAME, and to not grok
; what PATH_INFO is.  For more information on PATH_INFO, see the cgi specs.  Setting
; this to 1 will cause PHP CGI to fix its paths to conform to the spec.  A setting
; of zero causes PHP to behave as before.  Default is 1.  You should fix your scripts
; to use SCRIPT_FILENAME rather than PATH_TRANSLATED.
; http://php.net/cgi.fix-pathinfo
cgi.fix_pathinfo=0
```

接下来在修改www.conf

sudo vi /etc/php5/fpm/pool.d/www.conf

listen = 127.0.0.1:9000

```
; The address on which to accept FastCGI requests.
; Valid syntaxes are:
;   'ip.add.re.ss:port'    - to listen on a TCP socket to a specific address on
;                            a specific port;
;   'port'                 - to listen on a TCP socket to all addresses on a
;                            specific port;
;   '/path/to/unix/socket' - to listen on a unix socket.
; Note: This value is mandatory.
;listen = /var/run/php5-fpm.sock
listen = 127.0.0.1:9000
```

好了，修改好配置之后我们重启Nginx，php5-fpm

sudo service nginx restart

```
leunggeorge@ubuntu14:~$ sudo service nginx restart
 * Restarting nginx nginx                                               [ OK ]
```

sudo service php5-fpm restart

```
leunggeorge@ubuntu14:~$ sudo service php5-fpm restart
php5-fpm stop/waiting
php5-fpm start/running, process 8200
```

sudo vi /var/www/index.php

```
<?php
phpinfo();
```

叮咚。。。最终效果图：![](/assets/nginx/tcp方式效果预览.png)

系统端口查看：![](/assets/nginx/tcp方式配置成功后端口监控.png)哦了，上面就是TCP方式的全部配置过程。。。

## 2.2 unix socket方式

前面的TCP方式配置好了，接下来我们试试unix socket方式。

方式跟前面的TCP方式类似。

修改location配置，修改后的配置如下：

sudo vi /etc/nginx/sites-available/default

```
    location ~ \.php$ {
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        # NOTE: You should have "cgi.fix_pathinfo = 0;" in php.ini

        # With php5-cgi alone:
        # fastcgi_pass 127.0.0.1:9000;
        # With php5-fpm:
        fastcgi_pass unix:/var/run/php5-fpm.sock;
        fastcgi_index index.php;
        include fastcgi_params;
    }
```

然后修改php-fpm配置：

sudo vi /etc/php5/fpm/pool.d/www.conf

listen = /var/run/php5-fpm.sock

```
; The address on which to accept FastCGI requests.
; Valid syntaxes are:
;   'ip.add.re.ss:port'    - to listen on a TCP socket to a specific address on
;                            a specific port;
;   'port'                 - to listen on a TCP socket to all addresses on a
;                            specific port;
;   '/path/to/unix/socket' - to listen on a unix socket.
; Note: This value is mandatory.
;listen = /var/run/php5-fpm.sock
;listen = 127.0.0.1:9000
listen = /var/run/php5-fpm.sock
```

与修改TCP方式相同，重启Nginx与php-fpm：

sudo service nginx restart

```
leunggeorge@ubuntu14:~$ sudo service nginx restart
 * Restarting nginx nginx                                               [ OK ]
```

sudo service php5-fpm restart

```
leunggeorge@ubuntu14:~$ sudo service php5-fpm restart
php5-fpm stop/waiting
php5-fpm start/running, process 8846
```

预览效果与TCP方式一致，这里就不在贴图了。。。

