## 前言
简直不要太帅！！！没必要切换啊。直接在自己写的程序里加上 /usr/bin/env python3 就行了。

> [https://www.zhihu.com/question/30941329](https://www.zhihu.com/question/30941329)

上面的方法如此的简单（麻烦的是还需要多写一行代码）？图样图森破。。。万能的互联网人又造了个伟大的轮子`pyenv`,

## pyenv 安装
pyenv 提供了自动安装的工具，执行命令安装即可：


```
curl -L https://raw.githubusercontent.com/yyuu/pyenv-installer/master/bin/pyenv-installer | bash
```

安装成功后修改bash配置，需要在 `~/.zshrc`、`~/.bashrc` 或者 `~/.bash_profile` 中添加三行以启用。


```
export PATH="$HOME/.pyenv/bin:$PATH"
eval "$(pyenv init -)"
eval "$(pyenv virtualenv-init -)"
```

