## 其他资源

> 使用Docker安装运行paddlepaddle：[http://paddlepaddle.org/docs/develop/documentation/zh/build\_and\_install/docker\_install\_cn.html](http://paddlepaddle.org/docs/develop/documentation/zh/build_and_install/docker_install_cn.html)
>
> [深度学习101](#) 文档：[http://www.paddlepaddle.org/docs/develop/book/01.fit\_a\_line/index.cn.html](#)
>
> paddlepaddle 视频课程：[http://bit.baidu.com/course/detail/id/137.html](http://bit.baidu.com/course/detail/id/137.html)

## 安装paddlepaddle

### ubuntu 安装

PaddlePaddle是源于百度的一个深度学习平台。PaddlePaddle为深度学习研究人员提供了丰富的API，可以轻松地完成神经网络配置，模型训练等任务。

> 源码：[https://github.com/PaddlePaddle/Paddle](https://github.com/PaddlePaddle/Paddle)
>
> 安装教程：[http://www.paddlepaddle.org/docs/develop/documentation/fluid/zh/build\_and\_install/pip\_install\_cn.html](http://www.paddlepaddle.org/docs/develop/documentation/fluid/zh/build_and_install/pip_install_cn.html)

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

### docker安装

**1.安装docker**

**2.安装镜像**

```
docker pull docker.paddlepaddlehub.com/paddle
```

**3.安装paddle对应教程book**

```
https://github.com/PaddlePaddle/book/blob/develop/README.cn.md
```

## 引用：

> ubuntu16.04下安装pip：[https://blog.csdn.net/weixin\_37911283/article/details/70799481](https://blog.csdn.net/weixin_37911283/article/details/70799481)
>
> 使用Docker安装运行：[http://paddlepaddle.org/docs/develop/documentation/fluid/zh/build\_and\_install/docker\_install\_cn.html](http://paddlepaddle.org/docs/develop/documentation/fluid/zh/build_and_install/docker_install_cn.html)

## 



