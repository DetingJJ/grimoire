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

In Go, a name is exported if it begins with a capital letter. For example,`Pizza`is an exported name, as is`Pi`, which is exported from the`math`package.

`pizza`and`pi`do not start with a capital letter, so they are not exported.

When importing a package, you can refer only to its exported names. Any "unexported" names are not accessible from outside the package.

