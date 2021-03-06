### 1. 优点

* 每个服务足够内聚，足够小，代码容易理解、开发效率提高
* 服务之间可以独立部署，微服务架构让持续部署成为可能；
* 每个服务可以各自进行x扩展和z扩展，而且，每个服务可以根据自己的需要部署到合适的硬件服务器上；
* 容易扩大开发团队，可以针对每个服务（service）组件开发团队；
* 提高容错性（fault isolation），一个服务的内存泄露并不会让整个系统瘫痪；
* 系统不会被长期限制在某个技术栈上。

### 2. 缺点

《人月神话》中讲到：没有银弹，意思是只靠一把锤子是盖不起摩天大楼的，要根据业务场景选择设计思路和实现工具。我们看下为了换回上面提到的好处，我们付出（trade）了什么？

* 开发人员要处理分布式系统的复杂性；开发人员要设计服务之间的通信机制，对于需要多个后端服务的user case，要在没有分布式事务的情况下实现代码非常困难；涉及多个服务直接的自动化测试也具备相当的挑战性；
* 服务管理的复杂性，在生产环境中要管理多个不同的服务的实例，这意味着开发团队需要全局统筹（_PS：现在docker的出现适合解决这个问题_）
* 应用微服务架构的时机如何把握？对于业务还没有理清楚、业务数据和处理能力还没有开始爆发式增长之前的创业公司，不需要考虑微服务架构模式，这时候最重要的是快速开发、快速部署、快速试错。

> [基于微服务的软件架构模式](https://www.jianshu.com/p/546ef242b6a3)



