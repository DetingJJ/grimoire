DouPHP（[http://www.douco.com/](#)） 是一款轻量级企业网站管理系统，基于PHP+Mysql架构的，可运行在Linux、Windows、MacOSX、Solaris等各种平台上，系统搭载Smarty模板引擎，支持自定义伪静态，前台模板采用DIV+CSS设计，后台界面设计简洁明了，功能简单易具有良好的用户体验，稳定性好、扩展性及安全性强，可通过后台在线安装模块，比如会员模块、订单模块等，可面向中小型站点提供网站建设解决方案。

> 怎么去掉douPHP管理中心里面在线更新的提示：[https://zhidao.baidu.com/question/1048822507571026299.html](https://zhidao.baidu.com/question/1048822507571026299.html)
>
> 开发者社区：[http://bbs.douco.cn/forum.php](http://bbs.douco.cn/forum.php)



1.修复文章中心（预览页）汉字乱码

```
<p class="desc">{$article.description|truncate:130:"...":true:false}</p>
```



