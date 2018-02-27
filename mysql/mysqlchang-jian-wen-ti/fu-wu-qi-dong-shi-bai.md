报错信息：
> mysql mysql.server start  
Starting MySQL
./usr/local/Cellar/mysql/5.7.16/bin/mysqld_safe: line 135: /usr/local/var/mysql/MacBook-Pro-4.local.err: Permission denied
/usr/local/Cellar/mysql/5.7.16/bin/mysqld_safe: line 169: /usr/local/var/mysql/MacBook-Pro-4.local.err: Permission denied
/usr/local/Cellar/mysql/5.7.16/bin/mysqld_safe: line 135: /usr/local/var/mysql/MacBook-Pro-4.local.err: Permission denied
ERROR! The server quit without updating PID file (/usr/local/var/mysql/MacBook-Pro-4.local.pid).


解决方法（详见这篇文章）：
http://pein0119.github.io/2015/03/25/MySQL%E6%9C%8D%E5%8A%A1%E5%99%A8%E5%90%AF%E5%8A%A8%E9%94%99%E8%AF%AF-The-server-quit-without-updating-PID-file/

我的解决方法比较简单粗暴，直接`rm`文件`/usr/local/var/mysql/MacBook-Pro-4.local.err`

