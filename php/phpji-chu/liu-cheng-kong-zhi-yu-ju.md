流程控制语句是控制程序执行步骤的基本手段，也成为条件控制语句，主要有：

* **if语句**
* **if...else语句**
* **switch语句**

* **if语句**  
if语句,也可以理解为单分支控制语句,语法格式:

```
if (条件){
表达式;
}
```

* **if...else语句**
双路分支语句,语法格式:

```
if (条件){
    表达式语句1;
}else{
    表达式语句2;
}
```

* **switch语句**
switch 语句与elseif语句类似,属于多向分支语句. 使用elseif语句进行多重选择时十分繁琐,为了避免if语句过于冗长,提高可读性,在必要时使用switch语句是最好不过的了,switch语法格式如下:

```
switch(条件值){
    case  数值1:
        表达式语句1;
        break;
    case  数值2:
        表达式语句2;
        break;
    ....
    default:
        表达式语句n;
}
```



