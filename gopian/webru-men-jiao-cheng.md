## 热身

文件内容：example.go

```
package main

import "github.com/gin-gonic/gin"

func main() {
    r := gin.Default()
    r.GET("/ping", func(c *gin.Context) {
        c.JSON(200, gin.H{
            "message": "pong",
        })
    })
    r.Run() // listen and serve on 0.0.0.0:8080
}
```

目录下执行，然后在浏览器查看（127.0.0.1:8080）：

```
go run example.go
```

## 封装接口实现对DB的CURD操作

1.step1

clone源码：https://github.com/LeungGeorge/go-middleware

`clone` 到 `$GOPATH/go/src/github.com`

> 其中，[bbs](https://github.com/LeungGeorge/go-middleware/tree/master/bbs) 目录是本次项目的主要文件。



