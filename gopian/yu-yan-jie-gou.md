结构类似Python。

> 强行类比，哈哈。。。

**Go 语言的基础组成有以下几个部分：**

* 包声明
* 引入包
* 函数
* 变量
* 语句 &表达式
* 注释

```go
package main // 定义包名

import "fmt" // 告诉 Go 编译器这个程序需要使用 fmt 包

// 启动后第一个执行的函数（如果有 没有 init() 函数则会先执行main函数）
func init()  {
    fmt.Println("init")

}

// 第二入口函数
func main()  {
    /**
     这是我的注释
     */
    fmt.Println("hello world") // 将字符串输出到控制台，会自动换行（拼接\n）
}
```

输出：

```
init
hello world
```

## 导出名

Go中，大写开头的变量、函数会被导出（小写开头的对外不可见）。

例如：

```go
math.Pi // 正确(math包导出了，可见)
math.pi // 不正确(math包未导出了，不可见)
```



