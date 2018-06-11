## 入口文件 main.go



Go 程序入口函数与 C、C++ 一致，为main

```go
func main() {
	router := initRouter()

	router.Run(":8080")
}
```



