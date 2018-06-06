常量是一个简单值的标识符，在程序运行时，不会被修改的量。

常量中的数据类型只可以是布尔型、数字型（整数型、浮点型和复数）和字符串型。

常量的定义格式：

```go
const identifier [type] = value
```

> type可以省略，编译器会根据值来进行类型推断。

## iota

iota，特殊常量，可以认为是一个可以被编译器修改的常量。

在每一个const关键字出现时，被重置为0，然后再下一个const出现之前，每出现一次iota，其所代表的数字会自动增加1。

> 每出现一次iota：经测试是每出现一行代码，值会+1

iota 可以被用作枚举值：

```go
const (
    a = iota
    b = iota
    c = iota
)
```

或

```go
const (
    a = iota
    b
    c
)
```

有趣的例子：

```go
package main

import "fmt"

func main()  {
    const (
        a = iota   //0
        b          //1
        c          //2
        d = "ha"   //独立值，iota += 1
        e          //"ha"   iota += 1
        f = 100    //iota +=1
        g          //100  iota +=1
        h = iota   //7,恢复计数
        i          //8
    )
    fmt.Println(a,b,c,d,e,f,g,h,i)
}
```

输出：

```
0 1 2 ha ha 100 100 7 8
```



