## 切片\(Slice\)

Go语言中的切片是对数组的抽象。

简言之，切片就是动态数组（类似于C++的vector，PHP的数组等）。切片长度不是固定的，可追加元素，追加元素时，可能是切片容量增大。

### 定义切片

* 通过声明一个未指定大小的数组来定义切片：

```go
var identifier []type
```

> 注：切片不需要说明长度



* 使用 make\(\) 函数场景切片：

```go
var slice1 []type = make([]type, length)

或者简写为：

slice1 := make([]type, length)
```



