PaddlePaddle层的用法。

### fc {#permalink-4-fc}

**作用：**用来声明一个全连接层。

```
fc = fc(input=layer,
              size=1024,
              act=paddle.v2.activation.Linear(),
              bias_attr=False)
```

**参数：**

| 参数 | 类型 | 含义 |
| :--- | :--- | :--- |
| name | basestring | 全连接层名字（本参数可选） |
| input | paddle.v2.config\_base.Layer \| list \| tuple\) | 全连接层输入参数 |
| size | int | 全连接层维度 |
| act | paddle.v2.activation.Base | 激活类型，默认为：paddle.v2.activation.Tanh |
| param\_attr | paddle.v2.attr.ParameterAttribute \| list | 参数属性 |
|  |  |  |

**返回：**

paddle.v2.config\_base.Layer object

返回类型：

paddle.v2.config\_base.Layer

|  |
| :--- |


> 详细解释：[http://www.paddlepaddle.org/docs/0.11.0/api/en/api/v2/config/layer.html](http://www.paddlepaddle.org/docs/0.11.0/api/en/api/v2/config/layer.html)



