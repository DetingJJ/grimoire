Go（又称Golang）是Google开发的一种静态强类型、编译型、并发型，并具有垃圾回收功能的编程语言。

罗伯特·格瑞史莫，罗勃·派克（Rob Pike）及肯·汤普逊于2007年9月开始设计Go，稍后Ian Lance Taylor、Russ Cox加入项目。Go是基于Inferno操作系统所开发的。Go于2009年11月正式宣布推出，成为开放源代码项目，并在Linux及Mac OS X平台上进行了实现，后来追加了Windows系统下的实现。  
目前，Go每半年发布一个二级版本（即从a.x升级到a.y）。

> Go走一波！
>
> Google出品，
>
> 必是精品。
>
> ——摘自维基百科：[https://zh.wikipedia.org/wiki/Go](https://zh.wikipedia.org/wiki/Go)

---

## Go 语言特色

* 简洁、快速、安全
* 并行、有趣、开源
* 内存管理、v数组安全、编译迅速

## Go 语言用途

Go 语言被设计成一门应用于搭载 Web 服务器，存储集群或类似用途的巨型中央服务器的系统编程语言。

对于高性能分布式系统领域而言，Go 语言无疑比大多数其它语言有着更高的开发效率。它提供了海量并行的支持，这对于游戏服务端的开发而言是再好不过了。

Go 语言最主要的特性：

* 自动垃圾回收
* 更丰富的内置类型
* 函数多返回值
* 错误处理
* 匿名函数和闭包
* 类型和接口
* 并发编程
* 反射
* 语言交互性

## Go hello world

hello.go：

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

## 收藏

### go文档 {#id-小程序C端框架-go文档}

[https://golang.org/doc/](https://golang.org/doc/)

[https://tour.golang.org/basics/1](https://tour.golang.org/basics/1)

[http://gitbook.cn/books/5949de17d20911498c2b9dcd/index.html](http://gitbook.cn/books/5949de17d20911498c2b9dcd/index.html)

Go语言圣经：[https://yar999.gitbooks.io/gopl-zh/content/ch1/ch1-07.html](https://yar999.gitbooks.io/gopl-zh/content/ch1/ch1-07.html)

深入解析Go：[https://tiancaiamao.gitbooks.io/go-internals/content/zh/03.5.html](https://tiancaiamao.gitbooks.io/go-internals/content/zh/03.5.html)

Go Web 编程：https://wizardforcel.gitbooks.io/build-web-application-with-golang/content/



