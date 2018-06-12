## 错误号封装

其实这里主要是为了统一错误号，方便项目各处调用，维护一套代码即可。

实现的很简单，主要是个思路，收敛错误号，统一管理。

```go
package doraemonerror

// suc
const (
    DoraemonSuccess = 0    // suc
    DoraemonFailed  = 1000 // faild
)

//ErrorInfo
func ErrorInfo(errNo int) (errMsgEn string, errMsgCn string) {
    errMsgEn = ""
    errMsgCn = ""

    switch errNo {
    case DoraemonSuccess:
        {
            errMsgEn = "sucess"
            errMsgCn = "成功"
            break
        }
    case DoraemonFailed:
        {
            errMsgEn = "failed"
            errMsgCn = "失败"
            break
        }
    }
    return
}
```

> **源码：https://github.com/LeungGeorge/go-middleware/blob/master/errorno/doraemonerror.go**



