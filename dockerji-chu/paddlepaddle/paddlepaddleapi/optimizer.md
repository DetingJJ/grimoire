优化器，本文列出目前学习的，其他的请参考文档。

> [http://www.paddlepaddle.org/docs/0.11.0/api/en/api/v2/config/optimizer.html](http://www.paddlepaddle.org/docs/0.11.0/api/en/api/v2/config/optimizer.html)

## Momentum {#permalink-1-momentum}

_class_`paddle.v2.optimizer.Momentum`\(_momentum=None_, _sparse=False_, _\*\*kwargs_\)

当sparse=False时，momentum 更新方式为：

![](/assets/import-2018年05月29日17:50:36.png)

当sparse=True时，momentum 更新方式为：

![](/assets/import-2018年05月29日17:53:41.png)

---



