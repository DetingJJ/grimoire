question模块定义了CURD接口。

* add.go    
* delete.go
* info.go   
* list.go   
* update.go

为了在开发过程中，保持接口独立，每个接口放在一个单独的文件中。

> 以上几个文件，package 均为 question（同一目录下 package 名需要一致）

## add

我们可以通过 context.PostForm 方法拿到表单参数。例如，在例子中，我们通过 strQid:=context.PostForm\("qid"\) 获取到 qid；同理，获取到 title。

获取操作数据库的连接池：question:=doraemondb.DoraemonDBPool\(bbstype.DBWenda\)

> doraemondb 在包（github.com/LeungGeorge/go-middleware/mysql）中。
>
> bbstype.DBWenda 为预定义的字符串常量（在文件 bbstype/basictype.go 中）。

## delete

## info

## list

## update



