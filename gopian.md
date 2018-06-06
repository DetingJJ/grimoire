Go（又称Golang）是Google开发的一种静态强类型、编译型、并发型，并具有垃圾回收功能的编程语言。

罗伯特·格瑞史莫，罗勃·派克（Rob Pike）及肯·汤普逊于2007年9月开始设计Go，[2]，稍后Ian Lance Taylor、Russ Cox加入项目。Go是基于Inferno操作系统所开发的。[4]Go于2009年11月正式宣布推出，成为开放源代码项目，并在Linux及Mac OS X平台上进行了实现，后来追加了Windows系统下的实现。

Go是从2007年末由Robert Griesemer, Rob Pike, Ken Thompson主持开发，后来还加入了Ian Lance Taylor, Russ Cox等人，并最终于2009年11月开源，在2012年早些时候发布了Go 1稳定版本。现在Go的开发已经是完全开放的，并且拥有一个活跃的社区。

> Go走一波！
>
> Google出品，
>
> 必是精品。

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



