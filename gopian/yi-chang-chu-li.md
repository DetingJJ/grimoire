Go通过内置的错误接口，提供了简单的错误处理机制。

error类型定义如下：

```go
type error interface {
    Error() string
}
```



