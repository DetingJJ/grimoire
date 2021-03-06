## 语法规则

### 标识符

与常用编程语言一致：go标识符遵循由字母、数字、下划线组成，第一个字符必须为字母或下划线。

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

### 变量作用域

与其他语言类似，Go的变量分为两类：

* 局部变量：函数内定义的变量，作用域在函数体内，参数、返回值变量也是局部变量。
* 全局变量：函数外定义的变量，可以在整个包甚至外部包（被导出后）使用。

> 形式参数：函数定义中的变量（也成为函数的局部变量）。

**初始化局部和全局变量**

不同类型的局部和全局变量默认值为：

| 数据类型 | 初始化默认值 |
| :--- | :--- |
| int | 0 |
| float32 | 0 |
| pointer | nil |



