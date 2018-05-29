优化器，本文列出目前学习的，其他的请参考文档。

> [http://www.paddlepaddle.org/docs/0.11.0/api/en/api/v2/config/optimizer.html](http://www.paddlepaddle.org/docs/0.11.0/api/en/api/v2/config/optimizer.html)

## Momentum {#permalink-1-momentum}

_class_`paddle.v2.optimizer.Momentum`\(_momentum=None_, _sparse=False_, _\*\*kwargs_\)

当sparse=False时，momentum 更新方式为：

![](/assets/import-2018年05月29日17:50:36.png)

当sparse=True时，momentum 更新方式为：

![](/assets/import-2018年05月29日17:53:41.png)

**参数：**

| 参数 | 类型 | 含义 |
| :--- | :--- | :--- |
| momentum | float | 动量因子 |
| sparse | bool | sparse support（不知道叫啥，等查到文档了在来更新）？默认False |

---



