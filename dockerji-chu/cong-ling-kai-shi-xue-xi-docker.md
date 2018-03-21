## 安装docker

安装教程：[https://yeasy.gitbooks.io/docker\_practice/content/install/mac.html](https://yeasy.gitbooks.io/docker_practice/content/install/mac.html)

## docker使用

**docker Hello world**

```
➜  ~ docker run ubuntu:14.04 /bin/echo "hello world"
hello world
```

各个参数解析：

* **docker:**Docker 的二进制执行文件。

* **run:**与前面的 docker 组合来运行一个容器。

* **ubuntu:14.04**指定要运行的镜像，Docker首先从本地主机上查找镜像是否存在，如果不存在，Docker 就会从镜像仓库 Docker Hub 下载公共镜像。

* **/bin/echo "Hello world":**在启动的容器里执行的命令

以上命令完整的意思可以解释为：Docker 以 ubuntu14.04 镜像创建一个新容器，然后在容器里执行 bin/echo "Hello world"，然后输出结果。

**运行交互式的容器**

我们通过docker的两个参数 -i -t，让docker运行的容器实现"对话"的能力

```
➜  ~ docker run -i -t ubuntu:14.04 /bin/bash
root@aaae9436d4af:/#
```

**启动容器（后台模式）**

```
➜  ~ docker run -d ubuntu:14.04 /bin/sh -c "while true; do echo hello world; sleep 1; done"
3dbf10561e8d409918819b98bffc765e12fbe25964fd2a97ac4d9aaf7683d173
```

**启动Nginx**

假定当前目录：/usr/local/var

```
docker run -p 80:80 --name mynginx -v  /usr/local/var/www:/www -v  /usr/local/nginx/conf/nginx.conf:/etc/nginx/nginx.conf -v /usr/local/nginx/logs:/www/logs -d nginx 1e61af26e4ffb87bda27e23bbd060927d0cd62fce9e484cf61e582b3076f19c1



w3cschool@w3cschool:~/nginx$

w3cschool@w3cschool:~/nginx$ docker run -p 80:80 --name mynginx -v $PWD/www:/www -v $PWD/conf/nginx.conf:/etc/nginx/nginx.conf -v $PWD/logs:/wwwlogs  -d nginx  
45c89fab0bf9ad643bc7ab571f3ccd65379b844498f54a7c8a4e7ca1dc3a2c1e
w3cschool@w3cschool:~/nginx$
```

## 

## 备注

龙哥推荐，docker基础入门必读。给力。。。

从零开始学习 Docker：[https://www.jianshu.com/p/cf6e7248b6c7](https://www.jianshu.com/p/cf6e7248b6c7)

离线阅读功能详解：[https://github.com/yeasy/docker\_practice/wiki/离线阅读功能详解](https://github.com/yeasy/docker_practice/wiki/离线阅读功能详解)

我的镜像列表：[https://cr.console.aliyun.com/?spm=5176.1971733.2.28.6b9f5aaa30Cwoi\#/myFav](https://cr.console.aliyun.com/?spm=5176.1971733.2.28.6b9f5aaa30Cwoi#/myFav)

> 国内镜像（这个方法很赞）：[https://hub.daocloud.io/](https://hub.daocloud.io/)，顺便贴上文摘地址：[http://www.updateweb.cn/zwfec/item-115.html](http://www.updateweb.cn/zwfec/item-115.html)



