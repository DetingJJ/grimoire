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

目录下执行，然后在浏览器查看（127.0.0.1:8080/ping）：

```
go run example.go
```

## 封装接口实现对DB的CURD操作

### 准备

1.step1：

demo源码`clone` 到 `$GOPATH/go/src`：[https://github.com/LeungGeorge/go-curd](https://github.com/LeungGeorge/go-curd)

自定义包源码`clone` 到 `$GOPATH/go/src/github.com/LeungGeorge`：[https://github.com/LeungGeorge/go-middleware](https://github.com/LeungGeorge/go-middleware)

> 其中，[bbs](https://github.com/LeungGeorge/go-middleware/tree/master/bbs) 目录是本次项目的主要文件。[errorno](https://github.com/LeungGeorge/go-middleware/tree/master/errorno) 是自定义的一些错误号，[mysql](https://github.com/LeungGeorge/go-middleware/tree/master/mysql) 是封装的 MySQL 的 CURD 操作。

2.step2：运行demo

```
go run main.go
```

提示，可以看到 `bbs/question/\*` 一系列的接口（此处忽略 `home` 接口，测试使用）：

```
[GIN-debug] [WARNING] Creating an Engine instance with the Logger and Recovery middleware already attached.

[GIN-debug] [WARNING] Running in "debug" mode. Switch to "release" mode in production.
 - using env:    export GIN_MODE=release
 - using code:    gin.SetMode(gin.ReleaseMode)

[GIN-debug] GET    /                         --> main.home (3 handlers)
[GIN-debug] GET    /home                     --> main.home (3 handlers)
[GIN-debug] GET    /home/                    --> main.home (3 handlers)
[GIN-debug] GET    /question/info            --> bbs/question.Info (3 handlers)
[GIN-debug] GET    /question/list            --> bbs/question.List (3 handlers)
[GIN-debug] POST   /question/add             --> bbs/question.Add (3 handlers)
[GIN-debug] POST   /question/delete          --> bbs/question.Delete (3 handlers)
[GIN-debug] POST   /question/update          --> bbs/question.Update (3 handlers)
[GIN-debug] GET    /v1/home                  --> main.home (3 handlers)
[GIN-debug] GET    /v1/home/                 --> main.home (3 handlers)
[GIN-debug] Listening and serving HTTP on :8080
```

### question/info

接口：[http://127.0.0.1:8080/question/info?qid=3](http://127.0.0.1:8080/question/info?qid=3)

返回：

```
{
    "data": {
        "qid": 3,
        "title": "question 3",
        "deleted": 0
    },
    "err": 0,
    "messageCn": "成功",
    "messageEn": "sucess"
}
```

> ### **项目源码：**[https://github.com/LeungGeorge/go-curd](https://github.com/LeungGeorge/go-curd)



