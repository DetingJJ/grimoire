这是laravel Model 默认的方式来寻找数据库的表：如果你要使用其他的表名，在Model当中声明：

```
protected $table = 'article';

```

如果你没有声明这个属性，默认就是找model的复数形式。

> https://www.codecasts.com/discuss/laravel/why-data-table-must-be-eloquent-model-s-end-598



