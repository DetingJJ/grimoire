\# 说明

find命令用来查找并显示给定命令的路径，环境变量PATH保存了查找命令时需要遍历的目录。which指令则在环境变量$PATH设置的目录里查找符合条件的文件。

which命令，可以查看命令在系统中是否存在，以及执行的 到底是那个位置的命令。

\[find\]\([http://man.linuxde.net/find\](http://man.linuxde.net/find\)\)

\# 语法

which（选项）（参数）

\# 选项

-n&lt;文件名长度&gt;：制定文件名长度，指定的长度必须大于或等于所有文件中最长的文件名；

-p&lt;文件名长度&gt;：与-n参数相同，但此处的&lt;文件名长度&gt;包含了文件的路径；

-w：指定输出时栏位的宽度； -V：显示版本信息。

来自: [http://man.linuxde.net/which](http://man.linuxde.net/which)

\# 实例

\`\`\`

lyz@VM-90-103-ubuntu:~/lyz/github/shell/diff$ which pwd

/bin/pwd

\`\`\`

\`\`\`

lyz@VM-90-103-ubuntu:~/lyz/github/shell/diff$ which adduser

/usr/sbin/adduser

\`\`\`

说明：which是根据使用者所配置的$PATH 变量内的目录去搜寻可运行文件！

