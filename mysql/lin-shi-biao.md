# 什么是临时表，临时表什么时候删除？

时表可以手动删除：

```
DROP
TEMPORARY
TABLE
IF
EXISTS
 temp_tb;

```

**临时表只在当前连接可见，当关闭连接时，MySQL会自动删除表并释放所有空间。因此在不同的连接中可以创建同名的临时表，并且操作属于本连接的临时表**。

创建临时表的语法与创建表语法类似，不同之处是**增加关键字TEMPORARY**，如：

```
CREATE
TEMPORARY
TABLE
 tmp_table (
	
NAME
VARCHAR
 (
10
) 
NOT
NULL
,
	
time
date
NOT
NULL

);


select
 * 
from
 tmp_table;

```

# 

  


