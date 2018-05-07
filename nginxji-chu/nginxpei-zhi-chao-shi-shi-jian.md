## fastcgi

fastcgi\_connect\_timeout 5;

fastcgi\_send\_timeout 10; \# fastcgi进程向nginx进程发送response的整个过程的超时时间（默认单位秒\(s\),可以手动指定为分钟\(m\),小时\(h\)等）

fastcgi\_read\_timeout 10; \# nginx进程向fastcgi进程发送request的整个过程的超时时间（默认单位秒\(s\),可以手动指定为分钟\(m\),小时\(h\)等）

## keepalive\_timeout

```
Syntax:    keepalive_timeout timeout [header_timeout];
Default:    keepalive_timeout 75s;
Context:    http, server, location
```

第一个参数指定了与client的keep-alive连接超时时间。服务器将会在这个时间后关闭连接。可选的第二个参数指定了在响应头Keep-Alive: timeout=time中的time值。这个头能够让一些浏览器主动关闭连接，这样服务器就不必要去关闭连接了。没有这个参数，nginx不会发送Keep-Alive响应头（尽管并不是由这个头来决定连接是否“keep-alive”）  
第一个参数设置keep-alive客户端连接在服务器端保持开启的超时值。值为0会禁用keep-alive客户端连接。可选的第二个参数在响应的header域中设置一个值“Keep-Alive: timeout=time”。这两个参数可以不一样。

> 注：默认75s一般情况下也够用，对于一些请求比较大的内部服务器通讯的场景，适当加大为120s或者300s。第二个参数通常可以不用设置。

keepalive\_timeout  0;

