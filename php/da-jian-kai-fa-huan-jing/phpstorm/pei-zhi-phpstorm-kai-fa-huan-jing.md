## 创建脚本

用phpstorm创建一个php文件a.php

```php
<?php
    echo 'hello git';
```

## 运行脚本

点击chrome按钮![](/assets/huan-jing/a-php.png)

一般会遇到提示没有interpreter，配置即可。错误提示如图（点击configured PHP interpreter，进入配置解析器步骤）：

![](/assets/huan-jing/未找到解析器提示.png)

## 配置解析器

默认interpreter是空的，我们添加一个配置即可（点击右侧添加按钮）。![](/assets/huan-jing/配置解析器.png)

添加解析器窗口，点击左上角的+，添加解析器（出现下图select CLI Interpreter）。

**注意**：mac下需要新安装一个php，否则会提示解释器不可用。

![](/assets/huan-jing/添加解析器2.png)![](/assets/huan-jing/添加解析器.png)

**最终的结果如下图（大功告成）**![](/assets/huan-jing/解析器配置成功.png)

