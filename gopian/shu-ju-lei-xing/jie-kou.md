接口：把具有共性的方法定义在一起，其他类型如果实现了这些方法，就实现了这个接口。

## 举个栗子：

```go
package main

import "fmt"

type Car interface {
	run()
}

type Audi struct {

}

type Tesla struct {

}

func (audiCar Audi) run() {
	fmt.Println("audi car")
}

func (teslaCar Tesla) run() {
	fmt.Println("tesla car")
}

func main()  {
	// 声明一个map
	var car Car
	car = new(Audi)
	car.run() // 输出：audi car

	car = new(Tesla)
	car.run() // 输出：tesla car
}

```



