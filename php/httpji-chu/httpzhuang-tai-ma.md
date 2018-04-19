| 状态码 |  | 解释 |
| :--- | :--- | :--- |
|  |  |  |
| 1XX |  | 信息性（Informational） |
|  |  |  |
|  |  |  |
| 2XX |  | 成功（Success） |
| 200 |  | 表示从客户端发来的请求在服务器端被正常处理了。在响应报文中，随状态码一起返回的信息会因方法的不同而发生改变。比如，使用GET方法时，对应请求资源的实体会作为响应返回；而使用HEAD方法时，对于请求资源的实体首部不随报文主体作为响应返回（即在响应中只返回首部，不会返回实体的主体部分）。 |
| 204 | ::: |  |
|  |  |  |
| 3XX |  | 重定向（Redirection） |
|  |  |  |
|  |  |  |
| 4XX |  | 客户端错误（Client Error） |
| 404 |  | 请求的文件或目录不存在或删除。 |
|  |  |  |
| 5XX |  | 服务器错误（Server Error） |
| 500 |  | 服务器错误，无法完成请求。 |
| 502 |  | 服务器暂时不可用。服务器作为网关或代理，从上游服务器收到无效响应。 |
| 503 |  | 服务器超时 |
| 504 |  | 网关过载 |

**参考文档：**



> HTTP状态码：
>
> [http://baike.baidu.com/item/HTTP%E7%8A%B6%E6%80%81%E7%A0%81?fr=aladdin](http://baike.baidu.com/item/HTTP状态码?fr=aladdin "HTTP状态码")
>
> [http://www.cnblogs.com/jinjiangongzuoshi/p/3778883.html](http://www.cnblogs.com/jinjiangongzuoshi/p/3778883.html)



