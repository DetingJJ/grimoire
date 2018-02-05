已经搞定Nginx和PHP，接下来最后一步-------------------------MySQL搞起。。。

# 1.安装

sudo apt-get install mysql-server mysql-client php5-mys

提示是否安装输入y

Do you want to continue? \[Y/n\] y

然后设置数据库密码（输入密码，然后会再次弹框 需要再次输入一次确认）：

![](/assets/nginx/设置数据库密码.png)

执行过程：

```
leunggeorge@ubuntu14:~$ sudo apt-get install mysql-server mysql-client php5-mysql
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
  libxt6:i386 notification-daemon:i386
Use 'apt-get autoremove' to remove them.
The following extra packages will be installed:
  libaio1 libdbd-mysql-perl libdbi-perl libhtml-template-perl libmysqlclient18
  libperl5.18 libterm-readkey-perl mysql-client-5.5 mysql-client-core-5.5
  mysql-server-5.5 mysql-server-core-5.5 perl perl-base perl-modules
Suggested packages:
  libmldbm-perl libnet-daemon-perl libplrpc-perl libsql-statement-perl
  libipc-sharedcache-perl tinyca mailx perl-doc libterm-readline-gnu-perl
  libterm-readline-perl-perl libb-lint-perl libcpanplus-dist-build-perl
  libcpanplus-perl libfile-checktree-perl liblog-message-perl
  libobject-accessor-perl
The following NEW packages will be installed:
  libaio1 libdbd-mysql-perl libdbi-perl libhtml-template-perl libmysqlclient18
  libterm-readkey-perl mysql-client mysql-client-5.5 mysql-client-core-5.5
  mysql-server mysql-server-5.5 mysql-server-core-5.5 php5-mysql
The following packages will be upgraded:
  libperl5.18 perl perl-base perl-modules
4 upgraded, 13 newly installed, 0 to remove and 374 not upgraded.
Need to get 16.2 MB of archives.
After this operation, 97.5 MB of additional disk space will be used.
Do you want to continue? [Y/n] y
Get:1 http://cn.archive.ubuntu.com/ubuntu/ trusty-updates/main perl amd64 5.18.2-2ubuntu1.1 [2,648 kB]
Get:2 http://cn.archive.ubuntu.com/ubuntu/ trusty-updates/main libperl5.18 amd64 5.18.2-2ubuntu1.1 [1,332 B]
Get:3 http://cn.archive.ubuntu.com/ubuntu/ trusty-updates/main perl-base amd64 5.18.2-2ubuntu1.1 [1,146 kB]
Get:4 http://cn.archive.ubuntu.com/ubuntu/ trusty-updates/main perl-modules all 5.18.2-2ubuntu1.1 [2,673 kB]
Get:5 http://cn.archive.ubuntu.com/ubuntu/ trusty/main libaio1 amd64 0.3.109-4 [6,364 B]
Get:6 http://cn.archive.ubuntu.com/ubuntu/ trusty-updates/main libmysqlclient18 amd64 5.5.55-0ubuntu0.14.04.1 [597 kB]
Get:7 http://cn.archive.ubuntu.com/ubuntu/ trusty/main libdbi-perl amd64 1.630-1 [879 kB]
Get:8 http://cn.archive.ubuntu.com/ubuntu/ trusty-updates/main libdbd-mysql-perl amd64 4.025-1ubuntu0.1 [87.6 kB]
Get:9 http://cn.archive.ubuntu.com/ubuntu/ trusty/main libterm-readkey-perl amd64 2.31-1 [27.4 kB]
Get:10 http://cn.archive.ubuntu.com/ubuntu/ trusty-updates/main mysql-client-core-5.5 amd64 5.5.55-0ubuntu0.14.04.1 [707 kB]
Get:11 http://cn.archive.ubuntu.com/ubuntu/ trusty-updates/main mysql-client-5.5 amd64 5.5.55-0ubuntu0.14.04.1 [1,586 kB]
Get:12 http://cn.archive.ubuntu.com/ubuntu/ trusty-updates/main mysql-server-core-5.5 amd64 5.5.55-0ubuntu0.14.04.1 [3,737 kB]
Get:13 http://cn.archive.ubuntu.com/ubuntu/ trusty-updates/main mysql-server-5.5 amd64 5.5.55-0ubuntu0.14.04.1 [1,996 kB]
Get:14 http://cn.archive.ubuntu.com/ubuntu/ trusty-updates/main php5-mysql amd64 5.5.9+dfsg-1ubuntu4.21 [63.2 kB]
Get:15 http://cn.archive.ubuntu.com/ubuntu/ trusty/main libhtml-template-perl all 2.95-1 [65.5 kB]
Get:16 http://cn.archive.ubuntu.com/ubuntu/ trusty-updates/main mysql-client all 5.5.55-0ubuntu0.14.04.1 [11.2 kB]
Get:17 http://cn.archive.ubuntu.com/ubuntu/ trusty-updates/main mysql-server all 5.5.55-0ubuntu0.14.04.1 [11.3 kB]
Fetched 16.2 MB in 16s (960 kB/s)                                              
Preconfiguring packages ...
(Reading database ... 170205 files and directories currently installed.)
Preparing to unpack .../perl_5.18.2-2ubuntu1.1_amd64.deb ...
Unpacking perl (5.18.2-2ubuntu1.1) over (5.18.2-2ubuntu1) ...
Preparing to unpack .../libperl5.18_5.18.2-2ubuntu1.1_amd64.deb ...
Unpacking libperl5.18 (5.18.2-2ubuntu1.1) over (5.18.2-2ubuntu1) ...
Preparing to unpack .../perl-base_5.18.2-2ubuntu1.1_amd64.deb ...
Unpacking perl-base (5.18.2-2ubuntu1.1) over (5.18.2-2ubuntu1) ...
Processing triggers for man-db (2.6.7.1-1ubuntu1) ...
Setting up perl-base (5.18.2-2ubuntu1.1) ...
(Reading database ... 170205 files and directories currently installed.)
Preparing to unpack .../perl-modules_5.18.2-2ubuntu1.1_all.deb ...
Unpacking perl-modules (5.18.2-2ubuntu1.1) over (5.18.2-2ubuntu1) ...
Selecting previously unselected package libaio1:amd64.
Preparing to unpack .../libaio1_0.3.109-4_amd64.deb ...
Unpacking libaio1:amd64 (0.3.109-4) ...
Selecting previously unselected package libmysqlclient18:amd64.
Preparing to unpack .../libmysqlclient18_5.5.55-0ubuntu0.14.04.1_amd64.deb ...
Unpacking libmysqlclient18:amd64 (5.5.55-0ubuntu0.14.04.1) ...
Selecting previously unselected package libdbi-perl.
Preparing to unpack .../libdbi-perl_1.630-1_amd64.deb ...
Unpacking libdbi-perl (1.630-1) ...
Selecting previously unselected package libdbd-mysql-perl.
Preparing to unpack .../libdbd-mysql-perl_4.025-1ubuntu0.1_amd64.deb ...
Unpacking libdbd-mysql-perl (4.025-1ubuntu0.1) ...
Selecting previously unselected package libterm-readkey-perl.
Preparing to unpack .../libterm-readkey-perl_2.31-1_amd64.deb ...
Unpacking libterm-readkey-perl (2.31-1) ...
Selecting previously unselected package mysql-client-core-5.5.
Preparing to unpack .../mysql-client-core-5.5_5.5.55-0ubuntu0.14.04.1_amd64.deb ...
Unpacking mysql-client-core-5.5 (5.5.55-0ubuntu0.14.04.1) ...
Selecting previously unselected package mysql-client-5.5.
Preparing to unpack .../mysql-client-5.5_5.5.55-0ubuntu0.14.04.1_amd64.deb ...
Unpacking mysql-client-5.5 (5.5.55-0ubuntu0.14.04.1) ...
Selecting previously unselected package mysql-server-core-5.5.
Preparing to unpack .../mysql-server-core-5.5_5.5.55-0ubuntu0.14.04.1_amd64.deb ...
Unpacking mysql-server-core-5.5 (5.5.55-0ubuntu0.14.04.1) ...
Selecting previously unselected package mysql-server-5.5.
Preparing to unpack .../mysql-server-5.5_5.5.55-0ubuntu0.14.04.1_amd64.deb ...
Unpacking mysql-server-5.5 (5.5.55-0ubuntu0.14.04.1) ...
Selecting previously unselected package php5-mysql.
Preparing to unpack .../php5-mysql_5.5.9+dfsg-1ubuntu4.21_amd64.deb ...
Unpacking php5-mysql (5.5.9+dfsg-1ubuntu4.21) ...
Selecting previously unselected package libhtml-template-perl.
Preparing to unpack .../libhtml-template-perl_2.95-1_all.deb ...
Unpacking libhtml-template-perl (2.95-1) ...
Selecting previously unselected package mysql-client.
Preparing to unpack .../mysql-client_5.5.55-0ubuntu0.14.04.1_all.deb ...
Unpacking mysql-client (5.5.55-0ubuntu0.14.04.1) ...
Selecting previously unselected package mysql-server.
Preparing to unpack .../mysql-server_5.5.55-0ubuntu0.14.04.1_all.deb ...
Unpacking mysql-server (5.5.55-0ubuntu0.14.04.1) ...
Processing triggers for man-db (2.6.7.1-1ubuntu1) ...
Processing triggers for ureadahead (0.100.0-16) ...
Processing triggers for php5-fpm (5.5.9+dfsg-1ubuntu4.21) ...
php5-fpm stop/waiting
php5-fpm start/running, process 11858
Setting up libperl5.18 (5.18.2-2ubuntu1.1) ...
Setting up libaio1:amd64 (0.3.109-4) ...
Setting up libmysqlclient18:amd64 (5.5.55-0ubuntu0.14.04.1) ...
Setting up mysql-client-core-5.5 (5.5.55-0ubuntu0.14.04.1) ...
Setting up mysql-server-core-5.5 (5.5.55-0ubuntu0.14.04.1) ...
Setting up php5-mysql (5.5.9+dfsg-1ubuntu4.21) ...

Creating config file /etc/php5/mods-available/mysql.ini with new version
php5_invoke: Enable module mysql for cli SAPI
php5_invoke: Enable module mysql for fpm SAPI

Creating config file /etc/php5/mods-available/mysqli.ini with new version
php5_invoke: Enable module mysqli for cli SAPI
php5_invoke: Enable module mysqli for fpm SAPI

Creating config file /etc/php5/mods-available/pdo_mysql.ini with new version
php5_invoke: Enable module pdo_mysql for cli SAPI
php5_invoke: Enable module pdo_mysql for fpm SAPI
Setting up perl-modules (5.18.2-2ubuntu1.1) ...
Setting up perl (5.18.2-2ubuntu1.1) ...
Setting up libdbi-perl (1.630-1) ...
Setting up libdbd-mysql-perl (4.025-1ubuntu0.1) ...
Setting up libterm-readkey-perl (2.31-1) ...
Setting up mysql-client-5.5 (5.5.55-0ubuntu0.14.04.1) ...
Setting up mysql-server-5.5 (5.5.55-0ubuntu0.14.04.1) ...
170530 17:47:47 [Warning] Using unique option prefix key_buffer instead of key_buffer_size is deprecated and will be removed in a future release. Please use the full name instead.
170530 17:47:47 [Note] Ignoring --secure-file-priv value as server is running with --bootstrap.
170530 17:47:47 [Note] /usr/sbin/mysqld (mysqld 5.5.55-0ubuntu0.14.04.1) starting as process 12583 ...
mysql start/running, process 12715
Setting up libhtml-template-perl (2.95-1) ...
Setting up mysql-client (5.5.55-0ubuntu0.14.04.1) ...
Processing triggers for ureadahead (0.100.0-16) ...
Setting up mysql-server (5.5.55-0ubuntu0.14.04.1) ...
Processing triggers for libc-bin (2.19-0ubuntu6.6) ...
Processing triggers for php5-fpm (5.5.9+dfsg-1ubuntu4.21) ...
php5-fpm stop/waiting
php5-fpm start/running, process 12903
```

2.测试安装效果

方法一（直接控制台）：

mysql -h127.0.0.1 -uroot -p

```
leunggeorge@ubuntu14:db$ mysql -h127.0.0.1 -uroot -p
Enter password: 
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 44
Server version: 5.5.55-0ubuntu0.14.04.1 (Ubuntu)

Copyright (c) 2000, 2017, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> 
mysql> 
mysql> show databases;
+--------------------+
| Database           |
+--------------------+
| information_schema |
| mysql              |
| performance_schema |
+--------------------+
3 rows in set (0.10 sec)

mysql> 
mysql>
```

方式二（php代码测试）：

新建文件：

touch db/db.php

其中ppppppppppppp为前面你设置的密码。

```php
<?php

$host='127.0.0.1';
$root='root';
$pwd='ppppppppppppp';
$con= mysql_connect($host,$root,$pwd);

if ($con == false) {
    echo "connect false";
} else{
    echo "connect true";
}
```

在浏览器访问：http://127.0.0.1/db/db.php

打印 connect true ，表示链接数据库成功。。。

