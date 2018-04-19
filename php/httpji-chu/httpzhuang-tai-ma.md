## HTTP 状态码

| 状态码 | 说明 | 解释 |
| :--- | :--- | :--- |
| 1XX | 信息性（Informational） |  |
|  |  |  |
| 2XX | 成功（Success） |  |
| 200 | OK | 表示从客户端发来的请求在服务器端被正常处理了。在响应报文中，随状态码一起返回的信息会因方法的不同而发生改变。比如，使用 GET 方法时，对应请求资源的实体会作为响应返回；而使用 HEAD 方法时，对于请求资源的实体首部不随报文主体作为响应返回（即在响应中只返回首部，不会返回实体的主体部分）。 |
| 204 | No Content | 表示请求已成功处理，但是没有内容返回（就应该是没有内容返回的情况）。也就是返回响应报文没有报文实体。浏览提向服务器发送请求后收到 204，那么浏览器页面不会发生更新，一般用在只是客服端向服务器发送消息，二服务器不用向客户端发挥什么信息的情况。 |
| 205 | Partial Content | 表示服务器已经完成了部分 GET 请求（客户端进行了范围请求），响应报文中包含 Content-Range 指定范围的实体内容。 |
|  |  |  |
| 3XX | 重定向（Redirection） |  |
| 301 | Moved Permanently | 永久重定向，表示请求的资源已经永久的搬到了其他位置，就是说资源已经被分配了新的 URI，新的 URI 应该提示在响应报文的 Location 收不字段，只要不是 HEAD 请求，响应实体应该包含新URI的超链接和简短说明。 |
| 302 | Found | 临时重定向，表示请求的资源临时搬到了其他位置，请的的资源被配到了新的 URI。和 301 很像，只不过资源是临时移动资源在将来可能还会改变；同样地，新的临时 URI 应该提示在响应报文的 Location 首部字段。 |
| 303 | See Other | 表示请求资源存在另一个 URI，应使用 GET 定向获取请求资源；303 功能与 302 一样，区别只是 303 明确客户端应该使用 GET 访问（很多 HTTP/1.1 之前的浏览器不能理解 303，但是大家都把 302 当 303 对待使用 GTE 请求新 URI） |
| 304 | Not Modified | 表示客户端发送附带条件的请求（GET 方法请求报文中的 IF ...）时，条件不满足返回 304时，不包含任何响应主体。（虽然 304 被换分在 3XX，但和重定向一毛钱关系都没有。） |
| 305 |  | 请求者只能使用代理访问请求的网页。 |
| 307 | Temporary Redirect | 临时重定向，和 302 有着相同的含义；尽管 302 标准进制 POST 变为 GET，单没人听他的，而 307 就会遵照标准，不会从 POST 变为 GET，但响应处理行为，各浏览器可能不同。 |
|  |  |  |
| 4XX | 客户端错误（Client Error） |  |
| 400 | Bad Request | 表示请求报文存在语法错误或参数错误，服务器不理解；客户端不应该重复提交这个请求，需要修改请求内容后再次提交。 |
| 401 | Unauthorized | 需要通过 HTTP 认证或认证失败。 |
| 402 | Payment Required | 保留，将来使用。 |
| 403 | Forbidden | 请求资源被拒绝。 |
| 404 | Not Found | 请求的文件或目录不存在或删除。 |
| 405 | Method Not Allowed | 禁用请求中指定的方法。 |
| 406 | Not Acceptable | 无法使用请求的内容特性响应请求的网页。 |
| 407 | Proxy Authentication Required | 此代码与 401（Unauthorized）类似，但指定请求者应当授权使用代理。 |
| 408 | Request Time-out | 服务器等候请求时发生超时。 |
| 409 | Conflict | 服务器在完成请求时发生冲突，服务器必须在响应中包含有关冲突信息。 |
| 410 | Gone | 请求的资源已被永久删除。 |
| 411 | Length Required | 服务器不接受不含有效内容长度标头字段的请求。 |
| 412 | Precondition Failed | 服务器未满足请求者在请求中设置的其中一个前提条件。 |
| 413 | Request Entity Too Large | 服务器无法处理请求，应为请求实体过大，超出服务器处理能力。 |
| 414 | Request URI Too Large | 请求的 URI（通常为网址）过长，服务器无法处理。 |
| 415 | Unsupported Media Type | 请求的格式不受请求页面的支持。 |
| 416 | Requested Range Not Satisfiable | 如果页面无法提供请求的范围，则服务器会返回此代码。 |
| 417 | Exception Failed | 服务器未满足＂期望＂请求标头字段的要求。 |
|  |  |  |
| 5XX | 服务器错误（Server Error） |  |
| 500 | Internal Server Error | 服务器执行请求出错，无法完成请求。可能是 Web 应用有 bug 或临时故障，更有可能是服务器源代码有 bug... |
| 501 | Not Implemented | 服务器不具备完成请求的功能。如服务器无法识别请求方法时可能返回此代码。 |
| 502 | Bad Gateway | 服务器暂时不可用。服务器作为网关或代理，从上游服务器收到无效响应。 |
| 503 | Service Unavailable | 服务器超时，表示服务器超负载或正停机维护，无法处理请求；如果服务器知道还需要多长时间，就写入 Retry-After 首部字段返回。 |
| 504 | Gateway Time-out | 网关过载。 |
| 505 | HTTP Version Not Supported | 服务器不支持请求的 HTTP 协议版本，无法完成处理。 |

## 总结

返回的状态码和状态不一致的情况有可能发生的，比如 Web 应用程序内部错误，但仍然返回 200 OK。

**参考文档：**

> HTTP状态码：
>
> [http://baike.baidu.com/item/HTTP%E7%8A%B6%E6%80%81%E7%A0%81?fr=aladdin](http://baike.baidu.com/item/HTTP状态码?fr=aladdin "HTTP状态码")
>
> [http://www.cnblogs.com/jinjiangongzuoshi/p/3778883.html](http://www.cnblogs.com/jinjiangongzuoshi/p/3778883.html)



