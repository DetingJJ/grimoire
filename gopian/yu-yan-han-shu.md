Go 语言最少有个 main\(\) 函数。

A function can take zero or more arguments.

## 函数定义

Go 语言函数定义格式如下：

```go
func function_name( [parameter list] ) [return_types] {
    // function body
}
```

**说明：**

* func：函数由 func 开始声明。
* function\_name：函数名，函数名+参数列表 一起构成函数签名。
* parameter list：参数列表（形参）。参数列表指定的是参数类型、顺序、参数个数。
* return\_types：返回类型，函数返回一列值。return\_types 是该列值的数据类型。
* function body：函数体，函数定义的指令集（代码集合）。

### 参数传递

Go语言默认值传递。

| 传递类型 | 描述 |
| :--- | :--- |
| 值传递 | 值传递是指在调用函数时将实际参数复制一份传递到函数中，这样在函数中如果对参数进行修改，将不会影响到实际参数。 |
| 引用传递 | 引用传递是指在调用函数时将实际参数的地址传递到函数中，那么在函数中对参数所进行的修改，将影响到实际参数。 |

## 函数用法

| 函数用法 | 描述 |
| :--- | :--- |
| 函数作为值 | 函数定义后可作为值来使用 |
| 闭包 | 闭包是匿名函数，可在动态编程中使用 |
| 方法 | 方法就是一个包含了接受者的函数 |

### 函数作为值

Go可以创建函数作为值使用。

```go
package main

import (
    "fmt"
    "math"
)

func main()  {
    getSquareRoot := func(x float64) float64 {
        return math.Sqrt(x)
    }

    fmt.Println(getSquareRoot(81))
}
```

### 闭包

Go支持匿名函数，可以作为闭包。匿名函数是一个“内联”语句或表达式。匿名函数的优越性在于可以直接使用函数内的变量，不必申明。

```go
package main

import (
    "fmt"
    "math"
)

// 创建一个函数 getSequence()，返回另外一个函数。该函数的目的是在闭包中递增变量 i。
func getSequence() func() int {
    i := 0
    return func() int {
        i += 1
        return i
    }
}

func main()  {
    nextNumber := getSequence()
    fmt.Println(nextNumber())
    fmt.Println(nextNumber())
    fmt.Println(nextNumber())
    fmt.Println(nextNumber())

    nextNumber2 := getSequence()
    fmt.Println(nextNumber2())
    fmt.Println(nextNumber2())
    fmt.Println(nextNumber2())
    fmt.Println(nextNumber2())

}
```

### 方法

```go
package main

import (
    "fmt"
    "math"
)

type Circle struct {
    radius float64
}

func (c Circle) getArea() float64 {
    return 3.14 * c.radius * c.radius
}

func main()  {
    var c1 Circle
    c1.radius = 1

    fmt.Println(c1.getArea())
}
```

### 函数返回值多种举例

**返回单个个返回值：**

```go
package main

import "fmt"

func main()  {
    var ret int = max(45, 6)

    fmt.Println(ret)
}

func max(num1 int, num2 int) int {
    if num1 >= num2 {
        return num1
    } else {
        return num2
    }
}
```

**返回多个返回值：**

```go
package main

import "fmt"

func main()  {
    str1, str2 := swap("Mahesh", "Kumar")
    fmt.Println(str1, str2)
}

func swap(x, y string) (string, string) {
    return y, x
}
```



