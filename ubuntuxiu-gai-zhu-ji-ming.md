# Ubuntu修改主机名

1.查看/etc/hosts

test@test-ThinkPad-X220:~$ cat /etc/hosts

127.0.0.1	localhost

127.0.1.1	test-ThinkPad-X220

2.修改/etc/hosts的主机名

例如修改为：

test@test-ThinkPad-X220:~$ cat /etc/hosts

127.0.0.1	localhost

127.0.1.1	**ThinkPad**

3.查看/etc/hostname

test@test-ThinkPad-X220:~$ cat /etc/hostname

test-ThinkPad-X220

4.修改/etc/hostname的主机名【同2】

例如修改为：

**ThinkPad**

5.重启生效



