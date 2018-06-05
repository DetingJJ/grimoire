## 语法规则

### 关键字

下面列举了 Go 代码中会使用到的 25 个关键字或保留字：

| break | default | func | interface | select |
| :--- | :--- | :--- | :--- | :--- |
| case | defer | go | map | struct |
| chan | else | goto | package | switch |
| const | fallthrough | if | range | type |
| continue | for | import | return | var |

除了以上介绍的这些关键字，Go 语言还有 36 个预定义标识符：

| append | bool | byte | cap | close | complex | complex64 | complex128 | uint16 |
| :--- | :--- | :--- | :--- | :--- | :--- | :--- | :--- | :--- |
| copy | false | float32 | float64 | imag | int | int8 | int16 | uint32 |
| int32 | int64 | iota | len | make | new | nil | panic | uint64 |
| print | println | real | recover | string | true | uint | uint8 | uintptr |

### 可见性规则

Go语言中，使用大小写来决定该常量、变量、类型、接口、结构或函数是否可以被外部包所调用。

函数名首字母小写即为private:

```go
func getId() {}
```

函数名首字母大写即为public:

```go
func Printf() {}
```



