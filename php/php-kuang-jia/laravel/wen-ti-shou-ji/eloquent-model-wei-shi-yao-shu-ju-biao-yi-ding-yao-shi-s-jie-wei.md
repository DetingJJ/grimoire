## **网友一：**

这是laravel Model 默认的方式来寻找数据库的表：如果你要使用其他的表名，在Model当中声明：

```
protected $table = 'article';
```

如果你没有声明这个属性，默认就是找model的复数形式。

> [https://www.codecasts.com/discuss/laravel/why-data-table-must-be-eloquent-model-s-end-598](https://www.codecasts.com/discuss/laravel/why-data-table-must-be-eloquent-model-s-end-598)

## **网友二：**

[Eloquent ORM-基本用法](http://v4.golaravel.com/docs/4.2/eloquent#basic-usage)

注意我们并没有告诉 Eloquent User 模型会使用哪个数据库表。若没有特别指定，系统会默认自动对应名称为「类名称的小写复数形态」的数据库表。所以，在上面的例子中， Eloquent 会假设 User 将把数据存在 users 数据库表。可以在类里定义 table 属性自定义要对应的数据库表。

## **网友三：**

基本规范是这样的：

* 常规表名： 小写、下划线分割、最后一个单词采用英文复数（注意，不是单纯的加"s"）。

  * * 模型：首字母大写、驼峰试命名、英文单数。

* 多对多关联表：小写、下划线分割、英文单数。

  * * 模型：通常不需要额外定义。



