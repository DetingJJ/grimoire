**常量和变量有如下不同：**

* 常量前面没有美元符号（$）；
* 常量只能用 [define\(\)](itss://chm/res/function.define.html)函数定义，而不能通过赋值语句；
* 常量可以不用理会变量的作用域而在任何地方定义和访问；
* 常量一旦定义就不能被重新定义或者取消定义；
* 常量的值只能是标量。





**定义常量**

```
define("CONSTANT", "Hello world.");
echo CONSTANT; // outputs "Hello world."
echo Constant; // 输出 "Constant" 并发出一个提示级别错误信息
```

**使用关键字 const 定义常量**

```
// 以下代码在 PHP 5.3.0 后可以正常工作
const CONSTANT = 'Hello World';

echo CONSTANT;
```

> 和使用 [define\(\)](itss://chm/res/function.define.html) 来定义常量相反的是，使用 const 关键字定义常量必须处于最顶端的作用区域，因为用此方法是在编译时定义的。这就意味着不能在函数内，循环内以及 if 语句之内用 const 来定义常量。



