* [语法](itss://chm/res/language.constants.syntax.html)
* [魔术常量](itss://chm/res/language.constants.predefined.html)

常量是一个简单值的标识符（名字）。如同其名称所暗示的，在脚本执行期间该值不能改变（除了所谓的[魔术常量](itss://chm/res/language.constants.predefined.html)，它们其实不是常量）。常量默认为大小写敏感。传统上常量标识符总是大写的。

常量名和其它任何 PHP 标签遵循同样的命名规则。**合法的常量名以字母或下划线开始，后面跟着任何字母，数字或下划线。**用正则表达式是这样表达的：\[a-zA-Z\_\x7f-\xff\]\[a-zA-Z0-9\_\x7f-\xff\]\*。

**合法与非法的常量名：**

```
// 合法的常量名
define("FOO",     "something");
define("FOO2",    "something else");
define("FOO_BAR", "something more");

// 非法的常量名
define("2FOO",    "something");

// 下面的定义是合法的，但应该避免这样做：(自定义常量不要以__开头)
// 也许将来有一天PHP会定义一个__FOO__的魔术常量
// 这样就会与你的代码相冲突
define("__FOO__", "something");
```



