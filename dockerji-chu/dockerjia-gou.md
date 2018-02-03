摘要：\_Docker的架构 Docker使用的是 C-S架构。Docker的客户端同Docker Daemon进行交互，其中主要的工作是通过 daemon来完成，包括拉取镜像，编译镜像，运行容器，发布容器等。Docker client和daemon可以运行在同一个系统上，也可以通过远程方式进行访问。Doc

# Docker的架构 {#1}

Docker使用的是 C-S架构。Docker的客户端同Docker Daemon进行交互，其中主要的工作是通过 daemon来完成，包括拉取镜像，编译镜像，运行容器，发布容器等。Docker client和daemon可以运行在同一个系统上，也可以通过远程方式进行访问。Docker client和daemon之间是在 socket 上通过RESTful API来进行交互的。

![](/assets/import-Docker Client-Daemon.png)

> 原文：[https://yq.aliyun.com/articles/130?spm=a2c4e.11153940.blogcont131.9.134df62fyGh45e](https://yq.aliyun.com/articles/130?spm=a2c4e.11153940.blogcont131.9.134df62fyGh45e)



