导出数据表内容到文件：

```
mysql -hlocalhost -uroot -p123456 -A db_name -e "select * from tbl_test" > tbl_test_data.txt
```



