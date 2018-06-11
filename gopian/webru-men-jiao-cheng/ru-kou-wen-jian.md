## 入口文件 main.go

**定义main函数**

Go 程序入口函数与 C、C++ 一致，为main

```go
func main() {
    router := initRouter()

    router.Run(":8080")
}
```

> 说明：
>
> initRouter：定义本例子中的路由。
>
> router.Run：开启服务

**initRouter 方法**

主要功能为：指定 uri 到函数的映射关系。

为了看起来整洁，把定义路由的功能单独拿出来。



> 另外：支持多版本

```go
// router
func initRouter() *gin.Engine {
    router := gin.Default()

    // default router
    router.GET("/", home)
    router.GET("home", home)
    router.GET("home/", home)
    router.GET("question/info", question.Info)
    router.GET("question/list", question.List)
    router.POST("question/add", question.Add)
    router.POST("question/delete", question.Delete)
    router.POST("question/update", question.Update)

    //尝试一下多版本：v1 router
    v1 := router.Group("/v1")
    v1.GET("home", home)
    v1.GET("home/", home)

    return router
}
```

**完整代码：**

```go
package main

import (
    "bbs/question"
    "net/http"

    "github.com/LeungGeorge/go-middleware/mysql"
    "github.com/gin-gonic/gin"
)

// main
func main() {
    router := initRouter()

    router.Run(":8080")
}

// router
func initRouter() *gin.Engine {
    router := gin.Default()

    // default router
    router.GET("/", home)
    router.GET("home", home)
    router.GET("home/", home)
    router.GET("question/info", question.Info)
    router.GET("question/list", question.List)
    router.POST("question/add", question.Add)
    router.POST("question/delete", question.Delete)
    router.POST("question/update", question.Update)

    //尝试一下多版本：v1 router
    v1 := router.Group("/v1")
    v1.GET("home", home)
    v1.GET("home/", home)

    return router
}

// test inter face
func home(context *gin.Context) {
    context.JSON(http.StatusOK, gin.H{
        "status": doraemondb.DBTest(9),
    })
}
```



