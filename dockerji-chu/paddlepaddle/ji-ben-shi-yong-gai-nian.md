# 基本使用概念 {#permalink-0--}

PaddlePaddle是源于百度的一个深度学习平台。PaddlePaddle为深度学习研究人员提供了丰富的API，可以轻松地完成神经网络配置，模型训练等任务。 

## 配置网络 {#permalink-1--}

### 加载PaddlePaddle {#permalink-2--paddlepaddle}

**进行初始化操作：**

step1：import paddle

step2：paddle.init

```
step1：import paddle
step2：paddle.init
```

### 搭建神经网络 {#permalink-3--}

搭建神经网络就像使用积木搭建宝塔一样。在PaddlePaddle中，layer是我们的积木，而神经网络是我们要搭建的宝塔。我们使用不同的layer进行组合，来搭建神经网络。 宝塔的底端需要坚实的基座来支撑，同样，神经网络也需要一些特定的layer作为输入接口，来完成网络的训练。

例如，我们可以定义如下layer来描述神经网络的输入：

```
x = paddle.layer.data(name='x', type=paddle.data_type.dense_vector(2))
y = paddle.layer.data(name='y', type=paddle.data_type.dense_vector(1))
```

**其中x表示输入数据是一个维度为2的稠密向量，y表示输入数据是一个维度为1的稠密向量。**

PaddlePaddle支持不同类型的输入数据，主要包括四种类型，和三种序列模式。

四种数据类型：

* dense\_vector：稠密的浮点数向量。
* sparse\_binary\_vector：稀疏的01向量，即大部分值为0，但有值的地方必须为1。
* sparse\_float\_vector：稀疏的向量，即大部分值为0，但有值的部分可以是任何浮点数。
* integer：整数标签。

三种序列模式：

* SequenceType.NO\_SEQUENCE：不是一条序列
* SequenceType.SEQUENCE：是一条时间序列
* SequenceType.SUB\_SEQUENCE： 是一条时间序列，且序列的每一个元素还是一个时间序列。

不同的数据类型和序列模式返回的格式不同，列表如下：

不同的数据类型和序列模式返回的格式不同，列表如下：

|  | NO\_SEQUENCE | SEQUENCE | SUB\_SEQUENCE |
| :--- | :--- | :--- | :--- |
| dense\_vector | \[f, f, ...\] | \[\[f, ...\], \[f, ...\], ...\] | \[\[\[f, ...\], ...\], \[\[f, ...\], ...\],...\] |
| sparse\_binary\_vector | \[i, i, ...\] | \[\[i, ...\], \[i, ...\], ...\] | \[\[\[i, ...\], ...\], \[\[i, ...\], ...\],...\] |
| sparse\_float\_vector | \[\(i,f\), \(i,f\), ...\] | \[\[\(i,f\), ...\], \[\(i,f\), ...\], ...\] | \[\[\[\(i,f\), ...\], ...\], \[\[\(i,f\), ...\], ...\],...\] |
| integer\_value | i | \[i, i, ...\] | \[\[i, ...\], \[i, ...\], ...\] |

其中，f代表一个浮点数，i代表一个整数。

注意：对sparse\_binary\_vector和sparse\_float\_vector，PaddlePaddle存的是有值位置的索引。例如，

* 对一个5维非序列的稀疏01向量
  `[0,`
  `1,`
  `1,`
  `0,`
  `0]`
  ，类型是sparse\_binary\_vector，返回的是
  `[1,`
  `2]`
  。
* 对一个5维非序列的稀疏浮点向量
  `[0,`
  `0.5,`
  `0.7,`
  `0,`
  `0]`
  ，类型是sparse\_float\_vector，返回的是
  `[(1,`
  `0.5),`
  `(2,`
  `0.7)]`
  。

在定义输入layer之后，我们可以使用其他layer进行组合。在组合时，需要指定layer的输入来源。

## 引用

> 基本使用概念：http://staging.paddlepaddle.org/docs/0.10.0/documentation/zh/getstarted/concepts/use\_concepts\_cn.html



