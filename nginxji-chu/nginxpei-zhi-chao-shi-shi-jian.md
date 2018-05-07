## fastcgi
fastcgi_connect_timeout 5;

fastcgi_send_timeout 10; # fastcgi进程向nginx进程发送response的整个过程的超时时间（默认单位秒(s),可以手动指定为分钟(m),小时(h)等）

fastcgi_read_timeout 10; # nginx进程向fastcgi进程发送request的整个过程的超时时间（默认单位秒(s),可以手动指定为分钟(m),小时(h)等）



## keepalive_timeout

```
语法 keepalive_timeout timeout [ header_timeout ]
```



keepalive_timeout  0;
