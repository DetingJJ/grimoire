# **错误描述（MySQL无法连接\[MySql Host is blocked because of many connection errors\]）**

Host is blocked because of many connection errors; unblock with 'mysqladmin flush-hosts'

# **解决方案：**

1、提高允许的max\_connection\_errors数量（治标不治本）：  
 ① 进入Mysql数据库查看max\_connection\_errors： show variables like '%max\_connection\_errors%';  
 ② 修改max\_connection\_errors的数量为1000： set global max\_connect\_errors = 1000;  
 ③ 查看是否修改成功：show variables like '%max\_connection\_errors%';

2、**使用mysqladmin flush-hosts 命令清理一下hosts文件**（不知道mysqladmin在哪个目录下可以使用命令查找：whereis mysqladmin）；  
 ① 在查找到的目录下使用命令修改：/usr/bin/mysqladmin flush-hosts -h192.168.1.1 -P3308 -uroot -prootpwd;

实际操作中发现，最简单、快速的方式：

root帐号登录数据库（navicat），执行语句\[**flush hosts**\]即可。

> 备注：其中端口号，用户名，密码都可以根据需要来添加和修改；



> 引用
>
> [http://blog.csdn.net/wangjunjun2008/article/details/50698262](http://blog.csdn.net/wangjunjun2008/article/details/50698262)



