# 查询数据库所有表的行数

```
select table_name,table_rows from information_schema.tables where TABLE_SCHEMA = 'wenda' order by table_rows desc;
```





