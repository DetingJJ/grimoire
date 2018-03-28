# 数据库的读写分离、主从复制，主从复制分析的 7 个问题？

## 主从复制的几种方式

**同步复制**

* 所谓的同步复制，意思是master的变化，必须等待slave-1,slave-2,...,slave-n完成后才能返回。 这样，显然不可取，也不是MySQL复制的默认设置。比如，在WEB前端页面上，用户增加了条记录，需要等待很长时间。

**异步复制**

* 如同AJAX请求一样。master只需要完成自己的数据库操作即可。至于slaves是否收到二进制日志，是否完成操作，不用关心,MySQL的默认设置。

**半同步复制**

* master只保证slaves中的一个操作成功，就返回，其他slave不管。 这个功能，是由google为MySQL引入的。

## 主从复制分析的 7 个问题

**问题1：master的写操作，slaves被动的进行一样的操作，保持数据一致性，那么slave是否可以主动的进行写操作？**

假设slave可以主动的进行写操作，slave又无法通知master，这样就导致了master和slave数据不一致了。因此**slave不应该进行写操作**，至少是slave上涉及到复制的数据库不可以写。实际上，**这里已经揭示了读写分离的概念**。

**问题2：主从复制中，可以有N个slave,可是这些slave又不能进行写操作，要他们干嘛？**

**以实现数据备份**。

**类似于高可用的功能，一旦master挂了，可以让slave顶上去，同时slave提升为master**。

异地容灾，比如master在北京，地震挂了，那么在上海的slave还可以继续。

主要用于实现scale out,**分担负载,可以将读的任务分散到slaves上**。

【**很可能的情况是，一个系统的读操作远远多于写操作，因此写操作发向master，读操作发向slaves进行操作**】

**问题3：主从复制中有master,slave1,slave2,...等等这么多MySQL数据库，那比如一个JAVA WEB应用到底应该连接哪个数据库?**

当 然，我们在应用程序中可以这样，`insert/delete/update`这些更新数据库的操作，用`connection(for master)`进行操作，`select用connection(for slaves)`进行操作。那我们的应用程序还要完成怎么从slaves选择一个来执行select，例如**使用简单的轮循算法**。

这样的话，相当于应用程序完成了SQL语句的路由，而且与MySQL的主从复制架构非常关联，一旦master挂了，某些slave挂了，那么应用程序就要修改了。能不能让应用程序与MySQL的主从复制架构没有什么太多关系呢？

**找一个组件**，**application program只需要与它打交道，用它来完成MySQL的代理，实现SQL语句的路由**。

MySQL proxy并不负责，怎么从众多的slaves挑一个？可以交给另一个组件\(比如haproxy\)来完成。

这就是所谓的`MySQL READ WRITE SPLITE，MySQL`的读写分离。

**问题4：如果MySQL proxy , direct , master他们中的某些挂了怎么办？**

总统一般都会弄个副总统，以防不测。同样的，可以给这些关键的节点来个备份。

**问题5：当master的二进制日志每产生一个事件，都需要发往slave，如果我们有N个slave,那是发N次，还是只发一次？**

如果只发一次，发给了slave-1，那slave-2,slave-3,...它们怎么办？

显 然，应该发N次。实际上，**在MySQL master内部，维护N个线程，每一个线程负责将二进制日志文件发往对应的slave**。master既要负责写操作，还的维护N个线程，负担会很重。**可以这样，slave-1是master的从，slave-1又是slave-2,slave-3,...的主**，同时slave-1不再负责select。 **slave-1将master的复制线程的负担，转移到自己的身上**。**这就是所谓的多级复制的概念**。

**问题6：当一个select发往MySQL proxy，可能这次由slave-2响应，下次由slave-3响应，这样的话，就无法利用查询缓存了。**

应该找一个共享式的缓存，比如memcache来解决。将slave-2,slave-3,...这些查询的结果都缓存至mamcache中。

**问题7：随着应用的日益增长，读操作很多，我们可以扩展slave，但是如果master满足不了写操作了，怎么办呢？**

scale on ?更好的服务器？ 没有最好的，只有更好的，太贵了。。。

scale out ? 主从复制架构已经满足不了。

可以分库【垂直拆分】，分表【水平拆分】。

# 

  




