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





## 数字类型

Go 也有基于架构的类型，例如：int、uint 和 uintptr。

| 序号 | 类型和描述 |
| :--- | :--- |
| 1 | **uint8** 无符号 8 位整型 \(0 到 255\) |
| 2 | **uint16** 无符号 16 位整型 \(0 到 65535\) |
| 3 | **uint32** 无符号 32 位整型 \(0 到 4294967295\) |
| 4 | **uint64** 无符号 64 位整型 \(0 到 18446744073709551615\) |
| 5 | **int8** 有符号 8 位整型 \(-128 到 127\) |
| 6 | **int16** 有符号 16 位整型 \(-32768 到 32767\) |
| 7 | **int32** 有符号 32 位整型 \(-2147483648 到 2147483647\) |
| 8 | **int64** 有符号 64 位整型 \(-9223372036854775808 到 9223372036854775807\) |

浮点型：

| 序号 | 类型和描述 |
| :--- | :--- |
| 1 | **float32** IEEE-754 32位浮点型数 |
| 2 | **float64** IEEE-754 64位浮点型数 |
| 3 | **complex64** 32 位实数和虚数 |
| 4 | **complex128** 64 位实数和虚数 |

## 其他数字类型

以下列出了其他更多的数字类型：

| 序号 | 类型和描述 |
| :--- | :--- |
| 1 | **byte** 类似 uint8 |
| 2 | **rune** 类似 int32 |
| 3 | **uint** 32 或 64 位 |
| 4 | **int** 与 uint 一样大小 |
| 5 | **uintptr** 无符号整型，用于存放一个指针 |



