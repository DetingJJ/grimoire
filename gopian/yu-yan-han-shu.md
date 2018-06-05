Go 语言最少有个 main\(\) 函数。

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
* return\_\_types：返回类型，函数返回一列值。return\_\_types 是该列值的数据类型。
* function body：函数体，函数定义的指令集（代码集合）。

### 参数传递

| 传递类型 |
| :--- |


|  | 描述 |
| :--- | :--- |
| [值传递](http://www.runoob.com/go/go-function-call-by-value.html) | 值传递是指在调用函数时将实际参数复制一份传递到函数中，这样在函数中如果对参数进行修改，将不会影响到实际参数。 |
| [引用传递](http://www.runoob.com/go/go-function-call-by-reference.html) | 引用传递是指在调用函数时将实际参数的地址传递到函数中，那么在函数中对参数所进行的修改，将影响到实际参数。 |

## 函数用法举例

### 返回单个个返回值

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

### 返回多个返回值

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



