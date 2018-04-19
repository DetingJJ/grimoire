| 状态码 | 解释 |
| :--- | :--- |
| 1XX | 信息性（Informational） |
|  |  |
|  |  |
| 2XX | 成功（Success） |
| 200 | 表示请求被服务器正常处理，随着这个状态码返回的信息跟你的请求方法有关。比如：GET请求，请求的资源会作为响应式实体返回；HEAD请求，信息只存在于响应报文首部，因为他不会返回报文实体，只返回首部。 |
| 204 |  |
|  |  |
| 3XX | 重定向（Redirection） |
|  |  |
|  |  |
| 4XX | 客户端错误（Client Error） |
| 404 | 请求的文件或目录不存在或删除。 |
|  |  |
| 5XX | 服务器错误（Server Error） |
| 500 | 服务器错误，无法完成请求。 |
| 502 | 服务器暂时不可用。服务器作为网关或代理，从上游服务器收到无效响应。 |
| 503 | 服务器超时 |
| 504 | 网关过载 |

**参考文档：**

> HTTP状态码：
>
> [http://baike.baidu.com/item/HTTP%E7%8A%B6%E6%80%81%E7%A0%81?fr=aladdin](http://baike.baidu.com/item/HTTP状态码?fr=aladdin "HTTP状态码")
>
> [http://www.cnblogs.com/jinjiangongzuoshi/p/3778883.html](http://www.cnblogs.com/jinjiangongzuoshi/p/3778883.html)



