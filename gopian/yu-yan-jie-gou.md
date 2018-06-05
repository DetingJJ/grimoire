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
	fmt.Println("hello world")
}
```



