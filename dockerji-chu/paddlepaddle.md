## 其他资源

> 使用Docker安装运行paddlepaddle：[http://paddlepaddle.org/docs/develop/documentation/zh/build\_and\_install/docker\_install\_cn.html](http://paddlepaddle.org/docs/develop/documentation/zh/build_and_install/docker_install_cn.html)

## 

[深度学习101](#) 文档：[http://www.paddlepaddle.org/docs/develop/book/01.fit\_a\_line/index.cn.html](#)

## 安装paddlepaddle

**1.基础环境**

下表依赖是官方文档给出的：[http://paddlepaddle.org/docs/develop/documentation/fluid/zh/build\_and\_install/pip\_install\_cn.html](http://paddlepaddle.org/docs/develop/documentation/fluid/zh/build_and_install/pip_install_cn.html)

| 依赖 | 版本 | 说明 |
| :--- | :--- | :--- |
| 操作系统 | Linux, MacOS | CentOS 6以上，Ubuntu 14.04以上，MacOS 10.12以上 |
| Python | 2.7.x | 暂时不支持Python3 |
| libc.so | GLIBC\_2.7 | glibc至少包含GLIBC\_2.7以上的符号 |
| libstdc++.so | GLIBCXX\_3.4.11, CXXABI\_1.3.3 | 至少包含GLIBCXX\_3.4.11, CXXABI\_1.3.3以上的符号 |
| libgcc\_s.so | GCC\_3.3 | 至少包含GCC\_3.3以上的符号 |

**下面是我的机器基础环境：**

> 操作系统：Ubuntu 16.04.3 LTS
>
> Python版本：Python 2.7.12
>
> pip版本：pip 10.0.1【安装命令 sudo easy\_install pip ，详见引用《ubuntu16.04下安装pip》（可能非必须此版本，笔者安装时的最新版本，其他版本未做验证。）。】

**3.安装paddlepaddle**

另外还有使用Docker安装运行（尚未验证，具体方式详见引用《使用Docker安装运行》）。

```
pip install paddlepaddle
```



## 引用：

> ubuntu16.04下安装pip：[https://blog.csdn.net/weixin\_37911283/article/details/70799481](https://blog.csdn.net/weixin_37911283/article/details/70799481)
>
> 使用Docker安装运行：[http://paddlepaddle.org/docs/develop/documentation/fluid/zh/build\_and\_install/docker\_install\_cn.html](http://paddlepaddle.org/docs/develop/documentation/fluid/zh/build_and_install/docker_install_cn.html)



## 



