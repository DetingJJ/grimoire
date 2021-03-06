## 激活函数 {#31-激活函数}

激活函数是必须的。

激活函数的主要作用是提供网络的非线性建模能力。如果没有激活函数，那么该网络仅能够表达线性映射，此时即便有再多的隐藏层，其整个网络跟单层神经网络也是等价的。即，只有加入了激活函数，深度神经网络才具备了分层的非线性映射学习能力。

> 作用：提供网络的非线性建模能力。激活函数是用来加入非线性因素的，因为线性模型的表达能力不够。
>
> 神经网络激励函数的作用是什么？有没有形象的解释？：[https://www.zhihu.com/question/22334626](https://www.zhihu.com/question/22334626)
>
> 【机器学习】神经网络-激活函数-面面观\(Activation Function\)：[https://blog.csdn.net/cyh\_24/article/details/50593400](https://blog.csdn.net/cyh_24/article/details/50593400)
>
> [https://feisky.xyz/machine-learning/neural-networks/active.html](https://feisky.xyz/machine-learning/neural-networks/active.html)

## 损失函数 {#31-激活函数}

损失函数（loss function）是用来估量你模型的预测值f\(x\)与真实值Y的不一致程度，它是一个非负实值函数,通常使用L\(Y, f\(x\)\)来表示，损失函数越小，模型的鲁棒性就越好。损失函数是**经验风险函数**的核心部分，也是**结构风险函数**重要组成部分。

### **0-1损失函数和绝对值损失函数**

0-1损失是指，预测值和目标值不相等为1，否则为0：  
![](/assets/import-2018年06月04日21:00:01.png)

> 应用：感知机  
> 这种损失函数条件（相等条件）过于严格，应用时形式上会有所改进。

### log对数损失函数

形如：

![](/assets/import-2018年06月04日21:18:47.png)

> 应用：逻辑回归的损失函数就是对数函数

### 指数损失函数

形如：  
![](/assets/import-2018年06月04日21:19:30.png)

> 应用：AdaBoost就是一指数损失函数为损失函数的

### 均方误差

实际应用中，常见的损失函数为均方误差（Mean Squared Error，[MSE](https://en.wikipedia.org/wiki/Mean_squared_error)）：

![](/assets/import-2018年06月04日21:20:26.png)

> 深度学习笔记\(三\)：激活函数和损失函数：[https://blog.csdn.net/u014595019/article/details/52562159](https://blog.csdn.net/u014595019/article/details/52562159)



