# 基本使用概念 {#permalink-0--}

PaddlePaddle是源于百度的一个深度学习平台。PaddlePaddle为深度学习研究人员提供了丰富的API，可以轻松地完成神经网络配置，模型训练等任务。 这里将介绍PaddlePaddle的基本使用概念，并且展示了如何利用PaddlePaddle来解决一个经典的线性回归问题。 在使用该文档之前，请参考[安装文档](http://staging.paddlepaddle.org/docs/0.10.0/documentation/zh/getstarted/build_and_install/index_cn.html)完成PaddlePaddle的安装。



## 配置网络 {#permalink-1--}

### 加载PaddlePaddle {#permalink-2--paddlepaddle}

在进行网络配置之前，首先需要加载相应的Python库，并进行初始化操作。

```
import paddle.v2 as paddle
import numpy as np
paddle.init(use_gpu=False)
```

  


