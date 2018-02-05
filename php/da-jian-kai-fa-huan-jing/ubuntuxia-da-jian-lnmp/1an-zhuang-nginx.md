# 1.安装

come on 开始安装Nginx，运行命令：sudo apt-get -y install nginx

执行结果如下：

```
leunggeorge@ubuntu14:~$ sudo apt-get -y install nginx
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
  nginx-common nginx-core
Suggested packages:
  fcgiwrap nginx-doc
The following NEW packages will be installed:
  nginx nginx-common nginx-core
0 upgraded, 3 newly installed, 0 to remove and 378 not upgraded.
Need to get 349 kB of archives.
After this operation, 1,300 kB of additional disk space will be used.
Get:1 http://cn.archive.ubuntu.com/ubuntu/ trusty-updates/main nginx-common all 1.4.6-1ubuntu3.7 [19.0 kB]
Get:2 http://cn.archive.ubuntu.com/ubuntu/ trusty-updates/main nginx-core amd64 1.4.6-1ubuntu3.7 [325 kB]
Get:3 http://cn.archive.ubuntu.com/ubuntu/ trusty-updates/main nginx all 1.4.6-1ubuntu3.7 [5,352 B]
Fetched 349 kB in 0s (391 kB/s)   
Preconfiguring packages ...
Selecting previously unselected package nginx-common.
(Reading database ... 170064 files and directories currently installed.)
Preparing to unpack .../nginx-common_1.4.6-1ubuntu3.7_all.deb ...
Unpacking nginx-common (1.4.6-1ubuntu3.7) ...
Selecting previously unselected package nginx-core.
Preparing to unpack .../nginx-core_1.4.6-1ubuntu3.7_amd64.deb ...
Unpacking nginx-core (1.4.6-1ubuntu3.7) ...
Selecting previously unselected package nginx.
Preparing to unpack .../nginx_1.4.6-1ubuntu3.7_all.deb ...
Unpacking nginx (1.4.6-1ubuntu3.7) ...
Processing triggers for ufw (0.34~rc-0ubuntu2) ...
Processing triggers for ureadahead (0.100.0-16) ...
ureadahead will be reprofiled on next reboot
Processing triggers for man-db (2.6.7.1-1ubuntu1) ...
Setting up nginx-common (1.4.6-1ubuntu3.7) ...
Processing triggers for ufw (0.34~rc-0ubuntu2) ...
Processing triggers for ureadahead (0.100.0-16) ...
Setting up nginx-core (1.4.6-1ubuntu3.7) ...
Setting up nginx (1.4.6-1ubuntu3.7) ...
```

# 2.查看相关配置

运行命令dpkg -S nginx查看Nginx相关的包：

```
leunggeorge@ubuntu14:~$ dpkg -S nginx
nginx-common: /etc/nginx/scgi_params
nginx-common: /usr/share/doc/nginx-common/copyright
nginx: /usr/share/doc/nginx/copyright
nginx-common: /var/log/nginx
nginx-common: /etc/nginx/nginx.conf
nginx-common: /var/lib/nginx
nginx-common: /etc/nginx/win-utf
nginx-common: /etc/nginx/sites-available/default
nginx-common: /etc/nginx/mime.types
nginx-core: /usr/share/doc/nginx-core/CHANGES.gz
nginx-common: /etc/nginx/koi-utf
nginx: /usr/share/doc/nginx/CHANGES.gz
nginx-common: /etc/nginx/naxsi_core.rules
nginx-common: /usr/share/nginx/html/index.html
nginx-common: /usr/share/man/man1/nginx.1.gz
nginx-common: /lib/systemd/system/nginx.service
nginx-core: /usr/share/doc/nginx-core
nginx-core: /usr/share/lintian/overrides/nginx-core
nginx: /usr/share/doc/nginx/README.Debian
nginx-core: /usr/share/doc/nginx-core/copyright
nginx-common: /etc/nginx/uwsgi_params
nginx-common: /etc/nginx/proxy_params
nginx-common: /etc/nginx/conf.d
nginx-common: /usr/share/nginx/html
nginx-common: /usr/share/doc/nginx-common/changelog.Debian.gz
nginx: /usr/share/doc/nginx/changelog.Debian.gz
nginx-common: /etc/nginx/sites-enabled
nginx-common: /etc/init.d/nginx
nginx-common: /etc/nginx/fastcgi_params
nginx-common: /etc/default/nginx
nginx-core: /usr/share/doc/nginx-core/changelog.Debian.gz
nginx-common: /usr/share/doc/nginx-common/CHANGES.gz
nginx-common: /etc/nginx
nginx-common: /usr/share/doc/nginx-common
nginx-common: /etc/ufw/applications.d/nginx
nginx-common: /usr/share/doc/nginx-common/NEWS.Debian.gz
nginx-common: /etc/nginx/sites-available
nginx: /usr/share/doc/nginx
nginx-core: /usr/sbin/nginx
nginx-common: /usr/share/nginx/html/50x.html
nginx-common: /etc/nginx/koi-win
nginx-common: /etc/logrotate.d/nginx
nginx-common: /etc/nginx/naxsi.rules
nginx-common: /etc/nginx/naxsi-ui.conf.1.4.1
nginx-common: /usr/share/nginx
```

我们来看看几个主要的配置（摘自dpkg -S nginx结果）：

```
leunggeorge@ubuntu14:~$ dpkg -S nginx

nginx-common: /var/log/nginx ### Nginx日志
nginx-common: /etc/nginx/nginx.conf ### Nginx配置

nginx-common: /etc/nginx/sites-available/default ### 网站默认配置文件

nginx-common: /usr/share/nginx/html ### 网站默认目录

nginx-common: /etc/init.d/nginx ### Nginx可执行文件
```

# 3.启动Nginx

启动：

sudo /etc/init.d/nginx start

sudo service nginx start

停止：

重启：

查看Nginx进程（可以看到有一个master进程和4个worker进程），如下：

![](/assets/nginx/查看Nginx进程.png)

其中，worker进程配置在文件：/etc/nginx/nginx.conf

![](/assets/nginx/woker配置.png)

Nginx监听端口

![](/assets/nginx/nginx监听.png)

4.查看效果

浏览器地址栏，输入本机IP 或者 127.0.0.1

![](/assets/nginx/Nginx配置成功效果图.png)

或者通过curl访问（获取页面源码）：

curl [http://192.168.0.110/](http://192.168.0.110/)

```
<!DOCTYPE html>
<html>
<head>
<title>Welcome to nginx!</title>
<style>
    body {
        width: 35em;
        margin: 0 auto;
        font-family: Tahoma, Verdana, Arial, sans-serif;
    }
</style>
</head>
<body>
<h1>Welcome to nginx!</h1>
<p>If you see this page, the nginx web server is successfully installed and
working. Further configuration is required.</p>

<p>For online documentation and support please refer to
<a href="http://nginx.org/">nginx.org</a>.<br/>
Commercial support is available at
<a href="http://nginx.com/">nginx.com</a>.</p>

<p><em>Thank you for using nginx.</em></p>
</body>
</html>
```

[http://www.cnblogs.com/ilanni/archive/2015/07/08/4631149.html](http://www.cnblogs.com/ilanni/archive/2015/07/08/4631149.html)

