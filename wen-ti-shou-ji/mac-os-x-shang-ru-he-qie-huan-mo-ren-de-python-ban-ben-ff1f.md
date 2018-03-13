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

## pyenv 常用命令 {#pyenv-常用命令}
使用 `pyenv commands` 显示所有可用命令

### 查看本机Python版本
```
pyenv versions
```

### 查看可安装的Python版本
```
pyenv install -l
```

### Python 安装与卸载
```
pyenv install 2.7.3   # 安装python
pyenv uninstall 2.7.3 # 卸载python
```

### Python版本切换
```
pyenv global 2.7.3  # 设置全局的 Python 版本，通过将版本号写入 ~/.pyenv/version 文件的方式。
pyenv local 2.7.3 # 设置 Python 本地版本，通过将版本号写入当前目录下的 .python-version 文件的方式。通过这种方式设置的 Python 版本优先级较 global 高。
```










