现在，你应该能在访问https://konklone.com的时候，在地址栏里看到一个漂亮的小绿锁![](http://static.oschina.net/uploads/img/201309/26075158_Itfq.png)了，因为我把这个网站换成了HTTPS协议。一分钱没花就搞定了。

为什么要使用HTTPS协议：

* 虽然SSL并不是无懈可击的，但是我们应该
  [尽可能提高窃听成本](http://www.theguardian.com/world/2013/sep/05/nsa-how-to-remain-secure-surveillance)
* 加密通讯不应心存侥幸，
  [所有连接都应被加密](http://www.tbray.org/ongoing/When/201x/2012/12/02/HTTPS)
* 福利： 使用了HTTPS之后，如果网站的访客是从其他
  已经使用了HTTPS的网站上跳转过来，你就
  能在
  Goo
  gle Analytics中获取
  [更完整的来源信息](http://stackoverflow.com/a/1361720/16075)
  （比如
  [Hacker News](https://news.ycombinator.com/)
  ）。

本文将为您说明，如何通过开启您网站上的HTTPS协议来为构建和谐、安全的互联网添砖加瓦。尽管步骤有些多，但是每个步骤都很简单，聪明的你应该能在**1个小时之内**搞定这个事情。



