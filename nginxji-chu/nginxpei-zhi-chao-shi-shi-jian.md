fastcgi_connect_timeout 5;

fastcgi_send_timeout 10; # fastcgi进程向nginx进程发送response的整个过程的超时时间

fastcgi_read_timeout 10; # nginx进程向fastcgi进程发送request的整个过程的超时时间



