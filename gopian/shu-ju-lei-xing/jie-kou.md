接口：把具有共性的方法定义在一起，其他类型如果实现了这些方法，就实现了这个接口。

## 举个栗子：

定义了一个接口 Car，接口Car定义了一个方法 run\(\)。在定义的结构体中，实现了接口的方法，可以直接调用。

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



