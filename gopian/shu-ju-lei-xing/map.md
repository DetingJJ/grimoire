Map是无序键值对，使用hash表实现的。

## 定义Map

需要同时指定key（\[\]内），value（\[\]后）的type。

```go
func main()  {
    // 声明一个map
    var mp map[string]string
    // 使用make定义一个map
    mp2 := make(map[string]string)

    fmt.Println(mp) // 输出：map[]
    fmt.Println(mp2) // 输出：map[]
}
```

**举例：**

```go
func main()  {
    // 声明一个map
    var mp map[string]string
    mp = make(map[string]string)

    fmt.Println(mp) // 输出：map[]

    mp["baidu"] = "李彦宏"
    mp["tencent"] = "马化腾"
    mp["Alibaba"] = "马云"

    fmt.Println(mp) // 输出：map[baidu:李彦宏 tencent:马化腾 Alibaba:马云]

    for e := range mp {
        fmt.Println(e, "CEO is：", mp[e])
    }

    CEO, bExist := mp["google"]

    if (bExist) {
        fmt.Println("CEO是：", CEO)
    } else {
        fmt.Println("没有google的CEO")
    }

}
```

**输出：**

```go
map[]
map[Alibaba:马云 baidu:李彦宏 tencent:马化腾]
baidu CEO is： 李彦宏
tencent CEO is： 马化腾
Alibaba CEO is： 马云
没有google的CEO
```



