# MySQL 高并发环境解决方案？

MySQL 高并发环境解决方案 分库 分表 分布式 增加二级缓存。。。。。

**需求分析**：互联网单位 每天大量数据读取，写入，并发性高。

* **现有解决方式**：水平分库分表，由单点分布到多点数据库中，从而降低单点数据库压力。
* **集群方案**：解决DB宕机带来的单点DB不能访问问题。
* **读写分离策略**：极大限度提高了应用中Read数据的速度和并发量。无法解决高写入压力。

# 

  




