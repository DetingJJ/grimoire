# 1.Nginx

---

## 命令：

重启Nginx

```
sudo service nginx restart
```

## 配置：

# 2.php

---

## tcp，unix socket监听配置：

修改listen方式

```
sudo vi /etc/php5/fpm/pool.d/www.conf
```

## 命令：

重启php-fpm

```
sudo service php5-fpm restart
```

# 3.MySQL

## 命令：

```
 mysql -h127.0.0.1 -uroot -p
```



