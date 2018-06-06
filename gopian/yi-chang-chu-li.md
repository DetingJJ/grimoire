Go通过内置的错误接口，提供了简单的错误处理机制。

可以使用errors.New 可返回一个错误信息。

error类型定义如下：

```go
type error interface {
    Error() string
}
```



