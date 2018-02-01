# Nginx基本架构

一个 master 进程。负责生成多个 worker 进程。

事件驱动：epoll（边缘触发，Linux） kqueue（BSD）

I/O 复用器：select，poll，rt signal

支持 sendfile、sendfile64

支持 AIO

支持 mmap 内存映射

nginx 的工作模式：非阻塞、事件驱动，由一个 master 进程生成多个 worker 进程，每个 worker 响应 n 个请求。

