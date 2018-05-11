## 安装搜狗输入法

[http://jingyan.baidu.com/article/ad310e80ae6d971849f49ed3.html](http://jingyan.baidu.com/article/ad310e80ae6d971849f49ed3.html)

1.到官方网站下载搜狗输入法

2.下载安装后，在终端输入 im-config,打开配置页面，

这时会出现一个窗口点击ok，这是又出现一个窗口点击yes，

这时又出现一个窗口选择

fcitx，然后一路ok yes下去，重启电脑



## 安装五笔输入法

Ubuntu自带的输入法不太尽如人意思，用起来也不方便，我在Ubuntu和FC中都是用Fcitx，很好用！

安装配置如下：

1. 安装 fcitx

sudo apt-get install fcitx

2. 配置默认输入法为 fcitx

im-switch -s fcitx　　// 注意无须加 sudo

  


3. 重启 x-window

重启之后，fcitx 输入法应当正常启动，输入条将显示在屏幕最上面，不过输入框中文显示可能是 “口口”，需要小小的改动。

4. 修改配置文件

gedit ~/.fcitx/config

//如果没有配置gedit 支持GB18030编码，打开后文件会是乱码（此处针对9.10前版本，9.10无需配置已支持）

修改如下几项：

显示字体\(中\)=YaHei Consolas Hybrid

 //

主要是看你的OpenOffice中有什么字体，加进来就行

。

Enter键行为=1 \# =1表示回车时清除输入框中输入的内容，随个人喜好设置

上一页=, \# 使用 , . 翻页，随个人喜好设置

下一页=.

\[输入法\]

使用拼音=0

拼音名称=智能拼音

使用双拼=0

双拼名称=智能双拼

默认双拼方案=自然码

使用区位=0

区位名称=区位

使用码表=1

提示词库中的词组=1

其他输入法=

5. 修改码表文件

sudo gedit /usr/share/fcitx/data/tables.conf

由于五笔拼音已经完全够用，其它输入法就没必要出现了，文件中只需留下如下内容，其它配置段可以清除或注释掉。

\[码表\]

名称=五笔拼音

码表=wbpy.mb

调频=2

拼音=1

拼音键=z

自动上屏=-1

空码自动上屏=-1

自动词组=1

精确匹配=0

提示编码=0

6、重启 x-window

重启 x-window 之后，小企鹅输入法中文显示将完全正常，且只有“五笔拼音”，免去了在多个输入法中来回切换的麻烦。

Note： Restart 后小企鹅面板不是最上面，我们也以用\[Ctrl+Alt+h\]来把它调上来。

  


  


  


  


故障现象：

[ubuntu](http://blog.eibook.net/tag/ubuntu/)

14.04安装了im-switch后系统设置中不见了语言支持这个图标

故障原因：

im-switch与语言支持不兼容，两者只能取其一，安装其一，若另一个存在则会被卸载。

解决办法：

sudo apt-get install language-selector-gnome

| 1 | sudo apt - get install language - selector - gnome |
| :--- | :--- |


运行上面的命令。语言支持又正常变回来了。

