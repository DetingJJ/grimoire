scp用法：

```
scp -p work@serverhost:/home/work/orp/app/itopicd.rf.AlaTag/xml/pushTag.xml .
```

然后会提示让输入**serverhost的work的**密码。

每次都提示输入密码，如果想搞个ct任务复制文件，那岂不是就蛋疼了。。。。

那么问题来了。。。怎么才能不用每次都输入密码呢？感谢万能的网友[thinkerABC](http://my.csdn.net/thinkerABC)

废话少数直接上代码：

1. 在机器Client上root用户执行ssh-keygen命令，生成建立安全信任关系的证书。

```
 [root@client root]# ssh-keygen -b 1024 -t rsa
 Generating public/private rsa key pair.
 Enter file in which to save the key (/root/.ssh/id_rsa): 
 Enter passphrase (empty for no passphrase):            <-- 直接输入回车
 Enter same passphrase again:                           <-- 直接输入回车
 Your identification has been saved in /root/.ssh/id_rsa.
 Your public key has been saved in /root/.ssh/id_rsa.pub.
 The key fingerprint is:
 49:9c:8a:8f:bc:19:5e:8c:c0:10:d3:15:60:a3:32:1c root@Client
 [root@client root]#
```

注意：在程序提示输入passphrase时直接输入回车，表示无证书密码。

上述命令将生成私钥证书id\_rsa和公钥证书id\_rsa.pub，存放在用户家目录的.ssh子目录中。

1. 将公钥证书id\_rsa.pub复制到机器Server的root家目录的.ssh子目录中，同时将文件名更换为authorized\_keys。

```
[root@Client root]# scp -p .ssh/id_rsa.pub root@192.168.3.206:/root/.ssh/authorized_keys
root@192.168.3.206's password:          <-- 输入机器Server的root用户密码
id_rsa.pub           100% |**************************|   218       00:00
[root@Client root]#
```

在执行上述命令时，两台机器的root用户之间还未建立安全信任关系，所以还需要输入机器Server的root用户密码。

经过以上2步，就在机器Client的root和机器Server的root之间建立安全信任关系。下面我们看看效果：

```
[root@Client root]# scp -p text root@192.168.3.206:/root

text                 100% |**************************|    19       00:00

[root@Client root]#
```

成功了！真的不再需要输入密码了。

引用地址：[http://blog.csdn.net/thinkerabc/article/details/1798141](http://blog.csdn.net/thinkerabc/article/details/1798141)

