你要是看Python的源码或者相关框架的源码，总是在`__init__.py`或者是源文件的开头看到一个`__all__`变量的定义，今天就说说它的作用

## 问题出处 {#问题出处}

[Can someone explain**all**in Python?](http://stackoverflow.com/questions/44834/can-someone-explain-all-in-python)

## 问题 {#问题}

> I have been using Python more and more, and I keep seeing the variable`__all__`set in different`__init__.py`files. Can someone explain what this does?

我越来越多的使用Python了，经常看到`__all__`变量再各种`__init__.py`文件中，谁能解释为什么那么做呢？

## 解答 {#解答}

> 在模块\(\*.py\)中使用意为导出\_\_all\_\_列表里的类、函数、变量等成员，否则将导出modualA中所有不以下划线开头（私有）的成员，在模块中使用\_\_all\_\_属性可避免在相互引用时的命名冲突。

它是一个string元素组成的list变量，定义了当你使用`from <module> import *`导入某个模块的时候能导出的符号（这里代表变量，函数，类等）。

举个例子，下面的代码在`foo.py`中，明确的导出了符号`bar`,`baz`

```
__all__ = ['bar', 'baz']

waz = 5
bar = 10
def baz(): return 'baz'
'baz'
```

导入实现如下：

```
from foo import *

print bar
print baz

# The following will trigger an exception, as "waz" is not exported by the module
# 下面的代码就会抛出异常，因为 "waz"并没有从模块中导出，因为 __all__ 没有定义
print waz
```

如果把`foo.py`中`__all__`给注释掉，那么上面的代码执行起来就不会有问题，`import *`默认的行为是从给定的命名空间导出所有的符号（当然下划线开头的私有变量除外）。

### 注意 {#注意}

需要注意的是`__all__`只影响到了`from <module> import *`这种导入方式，对于`from <module> import <member>`导入方式并没有影响，仍然可以从外部导入。

> [https://blog.csdn.net/orangleliu/article/details/49848413](https://blog.csdn.net/orangleliu/article/details/49848413)



