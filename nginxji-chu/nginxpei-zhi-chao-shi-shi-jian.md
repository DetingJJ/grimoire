## fastcgi
fastcgi_connect_timeout 5;

fastcgi_send_timeout 10; # fastcgi进程向nginx进程发送response的整个过程的超时时间（默认单位秒(s),可以手动指定为分钟(m),小时(h)等）

fastcgi_read_timeout 10; # nginx进程向fastcgi进程发送request的整个过程的超时时间（默认单位秒(s),可以手动指定为分钟(m),小时(h)等）



## keepalive_timeout

```
Syntax:    keepalive_timeout timeout [header_timeout];
Default:    keepalive_timeout 75s;
Context:    http, server, location
```
第一个参数设置keep-alive客户端连接在服务器端保持开启的超时值。值为0会禁用keep-alive客户端连接。可选的第二个参数在响应的header域中设置一个值“Keep-Alive: timeout=time”。这两个参数可以不一样。
> 注：默认75s一般情况下也够用，对于一些请求比较大的内部服务器通讯的场景，适当加大为120s或者300s。第二个参数通常可以不用设置。


keepalive_timeout  0;
