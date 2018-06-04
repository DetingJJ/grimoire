## 激活函数 {#31-激活函数}

> 作用：提供网络的非线性建模能力。激活函数是用来加入非线性因素的，因为线性模型的表达能力不够。
>
> 神经网络激励函数的作用是什么？有没有形象的解释？：[https://www.zhihu.com/question/22334626](https://www.zhihu.com/question/22334626)

## 损失函数 {#31-激活函数}

损失函数（loss function）是用来估量你模型的预测值f\(x\)与真实值Y的不一致程度，它是一个非负实值函数,通常使用L\(Y, f\(x\)\)来表示，损失函数越小，模型的鲁棒性就越好。损失函数是**经验风险函数**的核心部分，也是**结构风险函数**重要组成部分。

实际应用中，常见的损失函数为均方误差（Mean Squared Error，[MSE](https://en.wikipedia.org/wiki/Mean_squared_error)）

$$MSE = \frac{1}{n}\sum_{i=1}^n(\bar Y$$i$$ - Y$$i$$)^2  \text {，均方误差} $$



> 深度学习笔记\(三\)：激活函数和损失函数：[https://blog.csdn.net/u014595019/article/details/52562159](https://blog.csdn.net/u014595019/article/details/52562159)



