# Nginx配置文件

main 配置段：全局配置段

event{}:定义 event 模型工作特性

http{}:定义 http 协议相关的配置

配置指令：要以分号结尾。

支持使用变量：

* 内置变量：模块会提供内置变量定义

* 自定义变量：set var\_name value;

主配置段的指令：

正常运行必备的配置

```
1.user username [groupname];指定运行 worker 进程的用户和组；
2.pid /path/to/pid_file;指定 nginx 守护进程的 pid 文件
  pid /var/run/nginx/nginx.pid
3.worker_rlimit_nofile number;指定所有 worker 进程所能打开最大文件句柄数
```

优化性能的配置

```
1.worker_processes #;worker 进程的个数；通常应该略少于 CPU 物理核心数；支持 auto
2.worker_cpu——affinity cpumask... (例子：00000001 00000010 00000100)
    优点：提升缓存的命中率
    cpumask：
        0000 0001：1 号 cpu
        0000 0010：2 号 cpu
3.timer_resolution:计时器解析度，降低此值，可以减少 gettimeofday()系统调用的次数
4.worker_priotity number;指明 worker 进程的 nice 值（越小，优先级越高）
```

事件相关的配置

```
1.accept_mutex {off|on};
    master 调度用户请求至各 worker 进程时使用的负载均衡锁；on 表示能让多个 worker 轮流地、序列化地
区响应新请求。
2.lock_file file;
    accept-mutex 用到的锁文件路径
3.use [epoll | rtsing | select | poll];
    指明使用的事件模式，建议让 Nginx 自行选择；
4.worker_connections number;
    设定单个 worker 进程所能够处理的最大并发连接数量；(但套接字有限)
    worker_connections * work_processes < 60000
```

用于调试、定位问题\(编译时加入--with-debug\)

```
1.daemon {on|off};
    是否以守护进程方式运行 nginx；调试时应该设置为 Off
2.master_process {on|off};
    是否以 master/worker 模型来运行 nginx，调试时可设置为 Off
3.error_log 位置级别{debug,info,notice,warn,error,crit,altert,emerg}
```

总结：

```
常需要进行调整的参数：worker_processes,worker_connections,worker_cpu_affinity,worker_priority
nginx -s {stop,quit,reopen,reload}
nginx -t :测试语法
```



