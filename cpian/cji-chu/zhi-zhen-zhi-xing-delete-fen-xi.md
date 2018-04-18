```
#include <iostream>

using namespace std;

class A
{
public: 
    A( void )
    {
        cout << "A::A( )默认构造函数" << endl;
    }
    ~A( void )
    {
        cout << "~A::A( )析构函数" << endl; 
    }
};

int main(int argc, char *argv[])
{
    A* p = new A; 
    delete p;
    p = NULL;

    return EXIT_SUCCESS;
}
```

总结：

1、正常顺序，执行正常。

  


    A\* p = new A; 

    delete p;

    p = NULL;

运行结果：构造-》析构

2、先delete再置NULL，则不会执行析构函数

    A\* p = new A; 

    p = NULL;

    delete p;

运行结果：构造

3、防止产生“野指针”

    执行delete之后，置空

野指针:http://baike.baidu.com/view/1291320.htm

