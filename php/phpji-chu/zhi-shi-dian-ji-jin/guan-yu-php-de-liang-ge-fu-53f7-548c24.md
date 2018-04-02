
@ 运算符只对表达式有效。对新手来说一个简单的规则就是：如果能从某处得到值，就能在它前面加上 @ 运算符。例如，可以把它放在变量，函数和 include() 调用，常量，等等之前。不能把它放在函数或类的定义之前，也不能用于条件结构例如 if 和 foreach 等。

> 目前的“@”错误控制运算符前缀甚至使导致脚本终止的严重错误的错误报告也失效。这意味着如果在某个不存在或类型错误的函数调用前用了“@”来抑制错误信息，那脚本会没有任何迹象显示原因而死在那里。


一句话，即 抑制报错的一种手段
