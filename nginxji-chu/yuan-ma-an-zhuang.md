# Nginx源码安装

```
yum -y install gcc gcc-c++
yum -y install pcre pcre-devel
yum -y install zlib zlib-devel
yum -y install openssl openssl-devel
tar xf nginx-VERSION.tar
cd nginx-VERSION
groupadd -r nginx
useradd -r nginx -g nginx
./configure --help(获取帮助)
--with-xx:原本没有启动，启动起来；--without-xx：原本已启动，停止启动
./configure --prefix=/usr/local/nginx --conf-path=/usr/local/nginx/conf/nginx/nginx.conf --user=nginx
--group=nginx --error-log-path=/var/log/nginx/error.log --http-log-path=/var/log/nginx/access.log
--pid-path=/var/run/nginx/nginx.pid --lock-path=/var/log/nginx.lock --with-http_ssl_module
--with-http_stub_status_module --with-http_gzip_static_module --with-http_flv_module --with-http_mp4_module
--http-client-body-temp-path=/var/tmp/nginx/client --http-proxy-temp-path=/var/tmp/nginx/proxy
--http-fastcgi-temp-path=/var/tmp/nginx/fastcgi --http-uwsgi-temp-path=/var/tmp/nginx/uwsgi
make -j 4 && make install
mkdir -pv /var/tmp/nginx/{client,proxy,fastcgi,uwsgi}
启动 nginx
/usr/local/nginx/sbin/nginx
```



