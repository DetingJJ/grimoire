## SET SQL\_MODE="NO\_AUTO\_VALUE\_ON\_ZERO";



一、设置sql模式有什么作用？会产生什么方面的影响？

模式定义mysql会支持哪些sql语法。以及应执行哪种数据验证检查。最终达到的目标：适应在不同环境中适应mysql，因为可

以根据各自的程序不同设置对于德sql操作模式。输入如下语句可以知道，当前使用的sql模式，select @@sql\_mode

比如，NO\_AUTO\_VALUE\_ON\_ZERO模式下，根据字面意思，没有自动增量为0的值。

这个是什么意思好像和AUTO\_INCREMENT有关系请问到底有什么关系

NO\_AUTO\_VALUE\_ON\_ZERO影响AUTO\_INCREMENT列的处理。一般情况，你可以向该列插入NULL或0生成下一个序列号。NO\_AUTO\_VALUE\_ON\_ZERO禁用0，因此只有NULL可以生成下一个序列号。

如果将0保存到表的AUTO\_INCREMENT列，该模式会很有用。\(不推荐采用该惯例\)。例如，如果你用mysqldump转储表并重载，MySQL遇到0值一般会生成新的序列号，生成的表的内容与转储的表不同。重载转储文件前启用NO\_AUTO\_VALUE\_ON\_ZERO可以解决该问题。

