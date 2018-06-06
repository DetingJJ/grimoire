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

也可以指定容量，其中capacity为可选容量参数：

```go
make([]type, length, capacity)
```

> length为数组的长度，也是切片的初始长度。

### 初始化切片

* 直接初始化：

```go
s := [] int {1, 2, 3, 4, 5, 6, }
fmt.Println(s)
fmt.Println(cap(s))
fmt.Println(len(s))
```

输出：

```go
[1 2 3 4 5 6]
6
6
```

* 通过数组初始化

```go
s := arr[startIndex:endIndex]
```

* 通过切片初始化

```go
s :=make([]int,len,cap)
```

## 空（nil）切片

```go
var s []int
fmt.Println(s)
fmt.Println(cap(s))
fmt.Println(len(s))
```

输出：

```go
[]
0
0
```

> 长度为0，容量为0

## 截取切片

可以通过截取数组元素的方式截取切片。

```go
s := arr[startIndex:endIndex]
```

## 常用函数

### len\(\)  函数

切片长度

### cap\(\) 函数

切片容量

### append\(\) 函数、copy\(\) 函数

append：追加内容

copy：复制切片

```go
func main()  {
    var s []int
    fmt.Printf("切片内容：%v\n", s)


    // 添加单个元素
    s = append(s, 1)
    fmt.Printf("添加一个元素后，切片内容：%v\n", s)

    // 添加多个元素
    s = append(s, 2, 3, 4)
    fmt.Printf("添加多个元素后，切片内容：%v\n", s)
    fmt.Printf("添加多个元素后，切片长度：%d\n", len(s))
    fmt.Printf("添加多个元素后，切片容量：%d\n", cap(s))

    // 切片扩容
    s2 := make([]int, len(s), 2 * (cap(s)))
    fmt.Printf("初始化新切片内容：%v\n", s)
    copy(s2, s)
    fmt.Printf("copy后，新切片内容：%v\n", s)
    fmt.Printf("copy后，新切片长度：%d\n", len(s))
    fmt.Printf("copy后，新切片容量：%d\n", cap(s))
}
```

输出：

```
初始化切片内容：[]
添加一个元素后，切片内容：[1]
添加多个元素后，切片内容：[1 2 3 4]
添加多个元素后，切片长度：4
添加多个元素后，切片容量：4
初始化新切片内容：[1 2 3 4]
copy后，新切片内容：[1 2 3 4]
copy后，新切片长度：4
copy后，新切片容量：4
```



