Go通过内置的错误接口，提供了简单的错误处理机制。

可以使用errors.New 可返回一个错误信息。

error类型定义如下：

```go
type error interface {
    Error() string
}
```

## 举个栗子

```go
package main

import "fmt"

type PositiveError struct {

}

func (obj PositiveError) Error() string {
	return "num is not positive!"
}

func positive(num int) (numRet int, errMsg string) {
	if num <= 0 {
		err := PositiveError{}
		errMsg = err.Error()
		return
	} else {
		return num, ""
	}
}

func main()  {
	// 输出：num is not positive!
	if ret, errMsg := positive(-9); errMsg == "" {
		fmt.Println(ret)
	} else {
		fmt.Println(errMsg)
	}
}
```



