# MySQL都有什么锁，死锁判定原理和具体场景，死锁怎么解决？

### MySQL都有什么锁

MySQL有三种锁的级别：**页级、表级、行级**。

* **表级锁**：开销小，加锁快；**不会出现死锁**；锁定粒度大，发生锁冲突的概率最高,并发度最低。
* **行级锁**：开销大，加锁慢；**会出现死锁**；锁定粒度最小，发生锁冲突的概率最低,并发度也最高。
* **页面锁**：开销和加锁时间界于表锁和行锁之间；**会出现死锁**；锁定粒度界于表锁和行锁之间，并发度一般。

lock mode定义：

```
/* Basic lock modes */
enum lock_mode {
    LOCK_IS = 0, /* intention shared */
    LOCK_IX, /* intention exclusive */
    LOCK_S, /* shared */
    LOCK_X, /* exclusive */
    LOCK_AUTO_INC, /* locks the auto-inc counter of a table
            in an exclusive mode */
    LOCK_NONE, /* this is used elsewhere to note consistent read */
    LOCK_NUM = LOCK_NONE, /* number of lock modes */
    LOCK_NONE_UNSET = 255
};
```

| lock mode | 级别 | 含义 |
| :--- | :--- | :--- |
| LOCK\_IS  | 表级锁 | 意向共享锁，表示将要在表上加共享锁。 |
| LOCK\_IX | 表级锁 | 意向排它锁，表示将要在表上加排它锁。 |
| LOCK\_S | 表共享锁、行共享锁 | 表共享锁：ALTER语句；行共享锁：insert on duplicate key； |

### 什么情况下会造成死锁

* 所谓死锁: 是指两个或两个以上的进程在执行过程中。
* 因争夺资源而造成的一种互相等待的现象,若无外力作用,它们都将无法推进下去。
* 此时称系统处于死锁状态或系统产生了死锁,这些永远在互相等竺的进程称为死锁进程。
* 表级锁不会产生死锁.所以解决死锁主要还是针对于最常用的InnoDB。

死锁的关键在于：两个\(或以上\)的Session加锁的顺序不一致。

那么对应的**解决死锁问题的关键就是**：让不同的session**加锁有次序**。

### 死锁的解决办法

* 查出的线程杀死 kill

```
SELECT trx_MySQL_thread_id FROM information_schema.INNODB_TRX;
```

* 设置锁的超时时间

Innodb 行锁的等待时间，单位秒。可在会话级别设置，RDS 实例该参数的默认值为 50（秒）。

生产环境不推荐使用过大的 `innodb_lock_wait_timeout`参数值

该参数支持在会话级别修改，方便应用在会话级别单独设置某些特殊操作的行锁等待超时时间，如下：

```
set innodb_lock_wait_timeout=1000; —设置当前会话 Innodb 行锁等待超时时间，单位秒。
```



