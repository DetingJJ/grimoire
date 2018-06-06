Map是无序键值对，使用hash表实现的。

## 定义Map

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



