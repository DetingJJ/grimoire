## 问题
> Operation failed: std::exception
Executing:
ALTER TABLE `my_project`.`tbl_test` 
ADD COLUMN `ext` VARCHAR(30000) NULL AFTER `name`;
ERROR 1074: Column length too big for column 'ext' (max = 21845); use BLOB or TEXT instead
SQL Statement:
ALTER TABLE `my_project`.`tbl_test` 
ADD COLUMN `ext` VARCHAR(30000) NULL AFTER `name`


## 表结构

```
CREATE TABLE `tbl_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(100) DEFAULT NULL COMMENT '名字',
  `ext` varchar(21742) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
```
> 注意21742这个长度，加起来整行长度为65535+1={4+(100+1)*3+(21742+1)*3}


## 解决方法
方法一：
按行最大值65535，计算字段的最大长度

方法二：
修改字段类型为text等超级类型（吼吼）

> [mysql 字段长度限制](http://blog.csdn.net/qq_31678877/article/details/52936625)