## PHPUnit {#PHPUnit-PHPUnit}

### 1、单个文件测试 {#PHPUnit-1、单个文件测试}

创建目录`tests`，新建文件 `StackTest.php`，编辑如下：

| `<?phprequire_once__DIR__ .'/../vendor/autoload.php';define("ROOT_PATH", dirname(__DIR__) ."/");useMonolog\Logger;useMonolog\Handler\StreamHandler;usePHPUnit\Framework\TestCase;classStackTestextendsTestCase {publicfunctiontestPushAndPop() {$stack= [];$this->assertEquals(0,count($stack));array_push($stack,'foo');// 添加日志文件,如果没有安装monolog，则有关monolog的代码都可以注释掉$this->Log()->error('hello',$stack);$this->assertEquals('foo',$stack[count($stack)-1]);$this->assertEquals(1,count($stack));$this->assertEquals('foo',array_pop($stack));$this->assertEquals(0,count($stack));}publicfunctionLog() {// create a log channel$log=newLogger('Tester');$log->pushHandler(newStreamHandler(ROOT_PATH .'storage/logs/app.log', Logger::WARNING));$log->error("Error");return$log;}}` |
| :--- |




```

```

**代码解释：**

1. StackTest为测试类
2. StackTest 继承于 
   `PHPUnit\Framework\TestCase`
3. 测试方法
   `testPushAndPop()`
   ，测试方法必须为
   `public`
   权限，一般以
   `test开头`
   ，或者你也可以选择给其加注释
   `@test`
   来表
4. 在测试方法内，类似于 
   `assertEquals()`
    这样的断言方法用来对实际值与预期值的匹配做出断言。

**命令行执行:**  
phpunit 命令 测试文件命名

| `./vendor/bin/phpunittests/StackTest.php` |
| :--- |




执行结果：

| `./vendor/bin/phpunittests/StackTest.phpPHPUnit 6.5.8 by Sebastian Bergmann and contributors..                                                                   1 / 1 (100%)Time: 71 ms, Memory: 4.00MBOK (1test, 5 assertions)` |
| :--- |




### 2、类文件引入 {#PHPUnit-2、类文件引入}

Calculator.php

| `<?phpclassCalculator{publicfunctionsum($a,$b){return$a+$b;}}?>` |
| :--- |




单元测试类：  
CalculatorTest.php

| `<?phprequire_once__DIR__ .'/../vendor/autoload.php';require"Calculator.php";usePHPUnit\Framework\TestCase;classCalculatorTestextendsTestCase{publicfunctiontestSum(){$obj=newCalculator;$this->assertEquals(1,$obj->sum(0, 0));}}` |
| :--- |


```

```

命令执行：

| `./vendor/bin/phpunittests/CalculatorTest.php` |
| :--- |




执行结果：

| `PHPUnit 6.5.8 by Sebastian Bergmann and contributors.F                                                                   1 / 1 (100%)Time: 28 ms, Memory: 4.00MBThere was 1 failure:1) CalculatorTest::testSumFailed asserting that 0 matches expected 1./usr/local/var/www/tests/CalculatorTest.php:14FAILURES!Tests: 1, Assertions: 1, Failures: 1.` |
| :--- |


  
会直接报出方法错误信息及行号，有助于我们快速找出bug

