# \(笔试题\)php练习笔试题（一）

## **项目设计**

假设有一个包含Tag功能的博客系统，数据库存储采用mysql，用户数量为1000万，预计文章总数为10亿，每天有至少10万的更新量，每天访问量为5000万，对数据库的读写操作的比例超过10：1。

你如何设计该系统，以确保其系统高效，稳定的运行?

提示：可以从数据库设计，系统框架，及网络架构方面进行描述，可以写代码/伪代码辅助说明，可以自由发挥

读写分离,读写服务器比例10:1,使用分页查询减少数据库压力,静态化分页后使用memcache分布式缓存,减少i/o开销和数据压力,增删改时删除对应的静态化数据,通过查询分页,分开静态化对应的分页信息缓存,数据库分库分表分区,使用lvs负载均衡,活跃和不活跃的文章进行分表存储,提高数据库中文章查询

效率,建立联合索引,提高查询效率,使用中文分词技术提高文章内容的查询效率

> [https://mp.weixin.qq.com/s?\_\_biz=MzIxMDA0OTcxNA==∣=2654254989&idx=1&sn=64e54adeb6994e320cf75ee8716e2b4c&chksm=8caa9850bbdd114613597bf19ff55d76744b2634bef6daee46750cc02c3054057345cd483587&scene=0&key=e672d24b70810412e8f799417b3861a0de52df0295daf1e5d888ceb152ce0b88e9983b18e88fda8fd6aa0779e6f3833d3b1a74d7b0cb1f94b5ee5a13263fa930e4792b2f5f7c3c72897da726b4be04dd&ascene=0&uin=MjA1OTQ1MjU%3D&devicetype=iMac+MacBookPro12%2C1+OSX+OSX+10.11.5+build\(15F34\)&version=12020810&nettype=WIFI&fontScale=100&pass\_ticket=KUYAQCf5ldqWLbYmT0vktu2EKtymY1qOHjeJ6r6793w%3D](https://mp.weixin.qq.com/s?__biz=MzIxMDA0OTcxNA==∣=2654254989&idx=1&sn=64e54adeb6994e320cf75ee8716e2b4c&chksm=8caa9850bbdd114613597bf19ff55d76744b2634bef6daee46750cc02c3054057345cd483587&scene=0&key=e672d24b70810412e8f799417b3861a0de52df0295daf1e5d888ceb152ce0b88e9983b18e88fda8fd6aa0779e6f3833d3b1a74d7b0cb1f94b5ee5a13263fa930e4792b2f5f7c3c72897da726b4be04dd&ascene=0&uin=MjA1OTQ1MjU%3D&devicetype=iMac+MacBookPro12%2C1+OSX+OSX+10.11.5+build%2815F34%29&version=12020810&nettype=WIFI&fontScale=100&pass_ticket=KUYAQCf5ldqWLbYmT0vktu2EKtymY1qOHjeJ6r6793w%3D "\(笔试题\)php练习笔试题（一")



