from\_unixtime\(\)是MySQL里的时间函数，date为需要处理的参数\(该参数是Unix 时间戳\),可以是字段名,也可以直接是Unix 时间戳字符串，后面的 '%Y%m%d' 主要是将返回值格式化。

```
SELECT FROM_UNIXTIME( 1249488000, '%Y%m%d' )

SELECT FROM_UNIXTIME( 1249488000, '%Y年%m月%d' ) 


```



