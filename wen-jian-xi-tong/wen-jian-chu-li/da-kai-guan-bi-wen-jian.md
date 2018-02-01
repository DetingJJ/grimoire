1.打开文件

> ```
> resource fopen ( string $filename , string $mode [, bool $use_include_path = false [, resource $context ]] )
> ```

其中，参数filename是文件名，可包含相对路径，可为绝对路径，如果不指定路径这默认为当前目录；参数mode是文件的打开方式，取值如表；参数use\_include\_path表示是否在include\_path中搜索文件（若搜索则设置为1或TRUE）。

| mode | 说明 |
| :--- | :--- |
| _'r'_ | 只读方式打开，将文件指针指向文件头。 |
| _'r+'_ | 读写方式打开，将文件指针指向文件头。 |
| _'w'_ | 写入方式打开，将文件指针指向文件头并将文件大小截为零。如果文件不存在则尝试创建之。 |
| _'w+'_ | 读写方式打开，将文件指针指向文件头并将文件大小截为零。如果文件不存在则尝试创建之。 |
| _'a'_ | 写入方式打开，将文件指针指向文件末尾。如果文件不存在则尝试创建之。 |
| _'a+'_ | 读写方式打开，将文件指针指向文件末尾。如果文件不存在则尝试创建之。 |
| _'x'_ | 创建并以写入方式打开，将文件指针指向文件头。如果文件已存在，则**fopen\(\)**调用失败并返回`FALSE`，并生成一条`E_WARNING`级别的错误信息。如果文件不存在则尝试创建之。这和给 底层的_open\(2\)_系统调用指定_O\_EXCL\|O\_CREAT_标记是等价的。 |
| _'x+'_ | 创建并以读写方式打开，其他的行为和_'x'_一样。 |
| _'c'_ | Open the file for writing only. If the file does not exist, it is created. If it exists, it is neither truncated \(as opposed to_'w'_\), nor the call to this function fails \(as is the case with_'x'_\). The file pointer is positioned on the beginning of the file. This may be useful if it's desired to get an advisory lock \(see[flock\(\)](http://php.net/manual/zh/function.flock.php)\) before attempting to modify the file, as using\_'w'\_could truncate the file before the lock was obtained \(if truncation is desired,[ftruncate\(\)](http://php.net/manual/zh/function.ftruncate.php)can be used after the lock is requested\). |
| _'c+'_ | Open the file for reading and writing; otherwise it has the same behavior as_'c'_. |

[http://php.net/manual/zh/function.fopen.php](http://php.net/manual/zh/function.fopen.php "php manual - fopen")

2.关闭文件

```
xsddddd00
```



