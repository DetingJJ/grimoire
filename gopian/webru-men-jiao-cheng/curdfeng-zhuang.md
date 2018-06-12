## CURD封装

实现了对 Insert、Select、Update、Delete操作的封装，使得对DB操作起来更简洁。

感谢万能的网友，提供了对buildSQL的封装。

以Select为例：

```go
//Select
func (db *DoraemonDB) Select(table string, where map[string]interface{}, selectFields []string) (rows *sql.Rows, err error) {
    //strSQL := buildSQL()
    // 这个包 666 啊
    /**
    tableName := "wenda_reply"
    where = map[string]interface{}{
        "city in":  []string{"beijing", "shanghai"},
        "score":    5,
        "age >":    35,
        "address":  builder.IsNotNull,
        "_orderby": "bonus desc",
        "_groupby": "department",
    }
    table := tableName
    */
    if where == nil || len(table) == 0 {
        return nil, nil
    }

    cond, values, err := builder.BuildSelect(table, where, selectFields)

    fmt.Print("cond: ")
    fmt.Println(cond)
    rows, err = db.objDB.Query(cond, values...)

    if err != nil {
        return nil, err
    }

    return
}
```

可以看到，提供表名 table，查询条件 where，要查询的列 selectFields；通过 builder.BuildSelect 可以构建 SQL 查询。

上面源码中，cond 打印如下：

```
cond: SELECT qid,title,deleted FROM question WHERE (qid=?) LIMIT 0,1
```

> Q：暂时有个小问题，我是用 qid=3 查询的，此处打印的是个 ? ，不太明白？？？

## 源码

> 源码：[https://github.com/LeungGeorge/go-middleware/blob/master/mysql/doraemondb.go](https://github.com/LeungGeorge/go-middleware/blob/master/mysql/doraemondb.go)



