# MySQL索引的创建、删除和查看

## 索引的作用

## 查看索引

查看索引：

```
show index from table_name;

show keys from table_name;
```

## 创建索引

```
CREATE INDEX index_name ON table_name (column_list)

CREATE UNIQUE INDEX index_name ON table_name (column_list)
```

## 删除索引

```
DROP INDEX index_name ON table_name

ALTER TABLE table_name DROP INDEX index_name

ALTER TABLE table_name DROP PRIMARY KEY
```



