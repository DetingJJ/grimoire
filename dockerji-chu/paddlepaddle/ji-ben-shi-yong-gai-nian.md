# 基本使用概念 {#permalink-0--}

PaddlePaddle是源于百度的一个深度学习平台。PaddlePaddle为深度学习研究人员提供了丰富的API，可以轻松地完成神经网络配置，模型训练等任务。

## 配置网络 {#permalink-1--}

### 加载PaddlePaddle {#permalink-2--paddlepaddle}

**进行初始化操作：**

```
step1：import paddle
step2：paddle.init
```

### 搭建神经网络 {#permalink-3--}

定义layer来描述神经网络输入：

```
x = paddle.layer.data(name='x', type=paddle.data_type.dense_vector(2))
y = paddle.layer.data(name='y', type=paddle.data_type.dense_vector(1))
```

**如上，其中x表示输入数据是一个维度为2的稠密向量，y表示输入数据是一个维度为1的稠密向量。**

PaddlePaddle输入数据的类型（四种数据类型，三种序列模式）：

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

|  | NO\_SEQUENCE | SEQUENCE | SUB\_SEQUENCE |
| :--- | :--- | :--- | :--- |
| dense\_vector | \[f, f, ...\] | \[\[f, ...\], \[f, ...\], ...\] | \[\[\[f, ...\], ...\], \[\[f, ...\], ...\],...\] |
| sparse\_binary\_vector | \[i, i, ...\] | \[\[i, ...\], \[i, ...\], ...\] | \[\[\[i, ...\], ...\], \[\[i, ...\], ...\],...\] |
| sparse\_float\_vector | \[\(i,f\), \(i,f\), ...\] | \[\[\(i,f\), ...\], \[\(i,f\), ...\], ...\] | \[\[\[\(i,f\), ...\], ...\], \[\[\(i,f\), ...\], ...\],...\] |
| integer\_value | i | \[i, i, ...\] | \[\[i, ...\], \[i, ...\], ...\] |

其中，f代表一个浮点数，i代表一个整数。

注意：对sparse\_binary\_vector和sparse\_float\_vector，PaddlePaddle存的是有值位置的索引。

> 详细解释见引用【基本使用概念】

## 引用

> 基本使用概念：[http://staging.paddlepaddle.org/docs/0.10.0/documentation/zh/getstarted/concepts/use\_concepts\_cn.html](http://staging.paddlepaddle.org/docs/0.10.0/documentation/zh/getstarted/concepts/use_concepts_cn.html)



