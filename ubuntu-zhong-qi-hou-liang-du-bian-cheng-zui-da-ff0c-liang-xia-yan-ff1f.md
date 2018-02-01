也是郁闷哦，貌似好多盆友都遇到了Ubuntu14.04设置的亮度不能保存，重启后变成了最大亮度。。。

我也遇到了这一问题，坑爹啊！！！有木有！！！

下面贴出来网上找到的解决办法：

1.step1

代开文件 /etc/default/grub：

```
sudo vi /etc/default/grub
```

修改文件行：

```
GRUB_CMDLINE_LINUX="acpi_backlight=vendor"
```

2.step2

打开文件 /etc/rc.local：

```
sudo vi /etc/rc.local
```

增设默认亮度（这个亮度值918是我根据我的电脑选的一个合适的值，可根据自身喜好进行配置）：

```
echo 918 > /sys/class/backlight/intel_backlight/brightness
```

查询当前亮度方法：

```
cat /sys/class/backlight/intel_backlight/brightness
```

3.step3

哦了。。。

