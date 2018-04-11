SET SQL\_MODE="NO\_AUTO\_VALUE\_ON\_ZERO";这个是什么意思好像和AUTO\_INCREMENT有关系请问到底有什么关系

NO\_AUTO\_VALUE\_ON\_ZERO影响AUTO\_INCREMENT列的处理。一般情况，你可以向该列插入NULL或0生成下一个序列号。NO\_AUTO\_VALUE\_ON\_ZERO禁用0，因此只有NULL可以生成下一个序列号。

如果将0保存到表的AUTO\_INCREMENT列，该模式会很有用。\(不推荐采用该惯例\)。例如，如果你用mysqldump转储表并重载，MySQL遇到0值一般会生成新的序列号，生成的表的内容与转储的表不同。重载转储文件前启用NO\_AUTO\_VALUE\_ON\_ZERO可以解决该问题。

