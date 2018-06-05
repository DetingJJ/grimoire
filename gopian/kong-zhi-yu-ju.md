作为快速入门，尽量彰显与其他语言的不同点。

## 条件判断语句

Go 语言提供了以下几种条件判断语句：

| 语句 | 描述 |
| :--- | :--- |
| if 语句 | **if 语句**由一个布尔表达式后紧跟一个或多个语句组成。 |
| if...else 语句 | **if 语句**后可以使用可选的**else 语句**, else 语句中的表达式在布尔表达式为 false 时执行。 |
| if 嵌套语句 | 你可以在**if**或**else if**语句中嵌入一个或多个**if**或**else if**语句。 |
| switch 语句 | **switch**语句用于基于不同条件执行不同动作。 |
| select 语句 | **select**语句类似于**switch**语句，但是select会随机执行一个可运行的case。如果没有case可运行，它将阻塞，直到有case可运行。 |

> 注意：屌屌的**select语句**，与其他语言不同点。

**select 语句的语法：**

* 每个case都必须是一个通信
* 所有channel表达式都会被求值
* 所有被发送的表达式都会被求值
* 如果任意某个通信可以进行，它就执行；其他被忽略。
* 如果有多个case都可以运行，Select会随机公平地选出一个执行。其他不会执行。

否则：

* 如果有default子句，则执行该语句。
* 如果没有default字句，select将阻塞，直到某个通信可以运行；Go不会重新对channel或值进行求值。


