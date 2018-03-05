[ZeroMQ网站解释：](http://www.zeromq.org/)

> ØMQ是网络栈中新的一层，它是个可伸缩层，分散在分布式系统间。因此，它可支持任意大的应用程序。ØMQ不是简单的点对点交互，相反，它定义了分布式系统的全局拓扑。ØMQ应用程序没有锁，可并行运行。此外，它可在多个线程、内核和主机盒之间弹性伸缩。



所有网络交互所使用的API实际上是Berkeley套接字\(BSD\) 。这个源自1980年代早期的协议是TCP/IP协议的最原始实现。而且可以说，在当今各操作系统中，它是受到最广泛支持的API，也是这些操作系统的核心组件之一。人们对BSD套接字的了解较多的是点对点的连接。点对点连接需要显式地建立连接、销毁连接、选择协议（TCP/UDP）和处理错误等。一旦你解决了以上所有问题，你就进入应用协议层（如HTTP）的世界了，这里需要的是组帧、缓存和处理逻辑等。换言之，编写高性能网络协议的应用程序一点儿也不复杂。

如果我们能对各种套接字类型、连接处理、帧、甚至路由的底层细节进行抽象，这不是件很好的事情吗？这正是[ZeroMQ（ØMQ/ZMQ）网络库](http://www.zeromq.org/)的由来：“它提供一些跨多种传输协议（如进程内通讯、IPC、TCP和广播）的套接字供你使用。你可使用多种方式实现N对N的套接字连接，譬如：扇出、发布订阅、任务分发以及请求响应。”

——Ilya Grigorik，即PostRank的创始人兼CTO，为[ZeroMQ写了个简介](http://www.igvita.com/2010/09/03/zeromq-modern-fast-networking-stack/)
