# Nginx简介

## **特点**

### 功能强大

* webserver/cache支持
* keepalive/pipelined支持
* 多upstream支持（http，fastcgi）
* 输出灵活控制：chunk/gzip
* 持续发展：http2/tcp，udp proxy

### 性能优异

* 多worker支持
* 非阻塞网络IO/高并发
* thread pool 支持文件IO
* 基于rbtree的定时器
* 系统特性持续支持

### 运维友好

* 配置相对友好
* 支持热加载，热更新
* 多server支持
* 容错性好
* 日志等自定义支持

### 扩展方便

* 代码质量高，可读性好
* 社区活跃
* 状态机模型
* 高度模块化
* 丰富的基础组件

### Nginx、Apache、Lighttpd比较（列表）

[http://www.blogjava.net/daniel-tu/archive/2008/12/29/248883.html](http://www.blogjava.net/daniel-tu/archive/2008/12/29/248883.html)

| **server** | **Apache** | **Nginx** | **Lighttpd** |
| :--- | :--- | :--- | :--- |
| Proxy代理 | 非常好 | 非常好 | 一般 |
| Rewriter | 好 | 非常好 | 一般 |
| Fcgi | 不好 | 好 | 非常好 |
| 热部署 | 不支持 | 支持 | 不支持 |
| 系统压力比较 | 很大 | 很小 | 比较小 |
| 稳定性 | 好 | 非常好 | 不好 |
| 安全性 | 好 | 一般 | 一般 |
| 技术支持 | 非常好 | 很少 | 一般 |
| 静态文件处理 | 一般 | 非常好 | 好 |
| Vhosts虚拟主机 | 支持 | 不支持 | 支持 |
| 反向代理 | 一般 | 非常好 | 一般 |
| Session sticky | 支持 | 不支持 | 不支持 |

注：在相对比较大的网站，节约下来的服务器成本无疑是客观的。而有些小型网站往往服务器不多，如果采用Apache这类传统Web服务器，似乎也还能撑过去。但有其很明显的弊端：Apache在处理流量爆发的时候\(比如爬虫或者是Digg效应\)很容易过载，这样的情况下采用Nginx最为合适。

建议方案：

Apache后台服务器（主要处理php及一些功能请求 如：中文url）

Nginx 前端服务器（利用它占用系统资源少得优势来处理静态页面大量请求）

Lighttpd图片服务器

总体来说，随着nginx功能得完善将使他成为今后web server得主流。

## nginx核心机制

### 框架

* master-worker模式
* 单线程/非阻塞

### 进程管理

* master：控制worker

热加载/热更新（work逐个加载配置），通过发信号（by signal）实现。

进程和进程之间隔离、拆work可使每个work在单独的cpu上运行（充分利用cache等）

* worker：处理请求的流程（状态机模型）

worker请求管理（状态变换）

### **基于事件框架的处理模型**

请求的调度基于事件

### 事件

1. 网络IO（读、写）：基于epoll的事件分发（linux下）；
2. 定时器：定时任务/超时管理；基于rbtree实现（快速查找、插入），最左边节点为最近超时。
3. 磁盘IO：linux异步IO机制（AIO）&epoll，（问题：AIO必须打开IO\_DIRECT，AIO会关闭sendfile）；新方案thread pool。写文件用异步IO；对于大文件，用thread pool & epoll，单独线程用于IO的读写，基于pthread。

### nginx核心机制：upstream

### upstream选举

选择一个适当的upstream

### 资源定位

* DNS：resolve支持
* 配置变更：dynamic upstream/bns module
* 异常识别：fail\_timeout+max\_\_fails/health\_check

### 负载均衡

ip\_hash/keepalive/least\_conn/hash etc.

### 重试控制

proxy\_next\_upstream\_tries etc.

### 和upstream进行交互

* 支持基于TCP的任何协议
* 业内：http、memcached、redis、mysql

### upstream交互优化点：buffering策略

* client&upstream速度的不一致
* buffering开启：client读取慢的情况
* buffering关闭：client快，直接返回

### 核心机制：其他

nginx对性能的极限追求，衍生很多机制

* accept mutex解决惊群效应
* 支持比如SO\_RESUSEORT特性
* time resolution减少系统调用
* ngx\_bug\_t/ngx\_chain\_t引入保证内存zero-copy
* 内核参数的持续支持：tcp\_cork/tcp\_defer\_accept
* 自定义的内存管理机制

## Nginx扩展说明

构建强大的生态

* nginx\_lua\_module

### 分类

* 按照对应子系统：http、stream、event
* 按照hook阶段：处理模块、过滤模块、负载均衡模块
* 按照语言：C、C++、Lua、JavaScript

大部分还是基于C、Lua的http扩展。

