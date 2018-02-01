# Nginx作为 web 服务器时使用的配置

http{}:由 ngx\_http\_core\_module 模块所引入；

配置框架：

```
http{
    upstream{...}
    server {
        location {...} 类似于 httpd 中的<Location>,用于定义 URL 与本地文件系统的映射关系，可有多个
    } #每个 server 类似于 httpd 中的一个<VirtualHost>
}
```

配置指令

1.server{}：定义一个虚拟主机

```
server{
    listen 8080;
    server_name www.bearlu.com;
    root "/vhost/web1";
}
```

2.listen：指定监听的地址和端口

```
listen address[:port]
listen port;
```

3.server\_name Name...:名称还可以使用正则表达式（~开头）通配符

```
（1）先做精确匹配检查；
（2）左侧通配符匹配检查：*.magedu.com
（3）右侧通配符匹配检查：mail.*
（4）正则表达式匹配检查：~*.*\magedu\.com$
（5）default_server
```

4.root path;设置资源路径映射；用于指明请求的 URL 所对应的资源所在的文件系统上的起始路径。

5.location \[= \| ~ \| ~\* \| ^~ \| url\] {...}

```
location @name {...}
允许根据用户请求的 URL 来匹配定义的各 location；匹配到时，此请求将被相应的 location 配置块中的
配置所处理，例如访问控制。
=：精确匹配检查
~：正则表达式模式匹配检查，区分字符大小写
~*：正则表达式模式匹配检查，不区分字符大小写
^~：URI 的前半部分匹配，不支持正则表达式
记住：匹配的优先级：=、^~、~、~*、不带符号的 location（越后，优先级越低）
```

6.alias path;

```
用于 location 配置段，定义路径别名；
注意：root 表示指明路径为对应的 location "/" URL
alias 表示路径映射，即 location 指令后定义的 URL 是相对与 alias 所指明的路径而言；
```

7.index file; 默认主页面

8.error\_page code \[...\] 状态码 \[=code\] URL\|@name

```
根据 http 响应状态码来指明特用的错误页面；
error_page 404 /404_customed.html
error_page 404 =200 /404_customed.html
```

9.基于 IP 的访问控制

```
allow、deny IP/network
allow IP、网络
```

10.基于用户的访问控制

```
basic、digest
auth_basic "验证原因"
auth_basic_user_file /etc/nginx/users/.htpasswd;
用 htpasswd -c (第一次创建) -m（使用 MD5 码） /etc/nginx/users/.htpasswd tom 创建用户账号和
密码文件
```

11.SSL

```
listen 443 ssl
server_name www.magedu.com
ssl_certificate /etc/nginx/ssl/nginx.crt;(证书)
ssl_certificate_key /etc/nginx/ssl/nginx.key;(私钥)
```

12.stub\_status {on \| off};nginx 状态统计页面

```
仅能用户 location 上下文。并且 allow IP; deny all;
显示结果：
Active connections：6 -----> 当前所有处于打开状态的连接数
server 已接受的连接数
accepts 已处理过的连接数
handled 已处理的请求书，在保持连接模式下
requests
Reading 正在接收请求状态的连接数
Writing 请求已经接收完成，正处理请求或发送响应的过程中的连接数
Waiting 处于保持 Keepalive 连接模式，且处于活动状态的连接数。
```

13.rewrite URL 重写

```
格式：rewrite regex replacement flag
rewrite ^/images/(.*\.jpg)$ /imgs/$1 break;
IP/images/a/b/c/1.jpg ---> IP/imgs/a/b/c/1.jpg
作用：域名切换、重定向
flag： 
    last：此 rewrite 规则重写完成后，不再被后面其他 rewrite 规则处理，而由 User Agent 重新对
    重写后 URL 再一次发起请求，并从头开始执行类似的过程；
    break：一旦此 rewrite 规则重写完成后，发起请求，且不会再被当前 location 内的任何 rewrite
    规则检测
    redirect：临时重定向，以 302 响应码返回新的 URL。（域名可改变）
    permanent：永久重定向，以 301 响应码返回的 URL。
```

14.if 上下文

```
语法：if(condition) {...}
应用场景：server、location
condition：
    （1）变量名：变量值为空串，或者以“0”开始，则为 false
    （2）以变量为操作数构成的比较表达式（=，！=）
    （3）正则表达式的模式匹配操作
            ~：区分大小写的模式匹配
            ~*：不区分大小写的模式匹配
            !~和!~*：对上面两种测试取反
    （4）测试路径是否为文件：-f、!-f
    （5）测试指定路径是否为目录：-d、!-d
    （6）测试文件的存在性：-e、!-e
    （7）测试文件是否有执行权限：-x、!-x

例如：
if($http_user_agent ~* MSIE){
    rewrite ^(.*)$ /msie/$1 break;
}
```

15.防盗链

```
location ~* \.(jpg | gif | jpeg | png)$ {
    valid_referer none blocked www.magedu.com;
    if ($invalid_referer) {
        rewrite ^/ http://www.magedu.com/403.html
    }
}
```

16.定制访问日志格式

```
log_format main "$remote_addr $remote_user [$time_local] $request"
access_log logs/access.log main;
此处可以使用 nginx 各模块内建变量；
```

17.网络连接相关的配置

```
1.keepalive_timeout #;长连接的超时时长
2.keepalive_requests #;在一个长连接上所能够允许请求的最大资源数
3.keepalive_disable [msie6 | safari | none];为指定类型的 UserAgent 禁用长连接
4.tcp_nodelay on|off;是否对长连接使用 TCP_NODELAY 选项；更优化用户体验就打开，否则，等待充足的
量才返回
5.client_header_timeout #;读取 http 请求报文首部的超时时长
6.client_body_timeout #;读取 http 请求报文 body 部分的超时时长
7.send_timeout #;发送相应报文的超时时长
```



