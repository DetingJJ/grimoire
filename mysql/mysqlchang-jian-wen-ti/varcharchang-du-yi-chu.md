## 问题
Operation failed: std::exception
Executing:
ALTER TABLE `my_project`.`tbl_test` 
ADD COLUMN `ext` VARCHAR(30000) NULL AFTER `name`;

ERROR 1074: Column length too big for column 'ext' (max = 21845); use BLOB or TEXT instead
SQL Statement:
ALTER TABLE `my_project`.`tbl_test` 
ADD COLUMN `ext` VARCHAR(30000) NULL AFTER `name`

## 解决方法
