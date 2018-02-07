**如何在 Git 里撤销\(几乎\)任何操作**

**一、modify后**

**二、add后**

**二、commit后**  
修正最后一个 commit 消息

> **场景：**你在最后一条 commit 消息里有个笔误，已经执行了 `git commit -m "Fxies bug #42"，但在git push` 之前你意识到消息应该是 “Fixes bug \#42″。



**二、push后**  
撤销一个“已公开”的改变

> **场景：**你已经执行了 `git push`, 把你的修改发送到了 GitHub，现在你意识到这些 commit 的其中一个是有问题的，你需要撤销那一个 commit.
>
> **方法:**`git revert <SHA>`
>
> **原理:**`git revert`会产生一个新的 commit，它和指定 SHA 对应的 commit 是相反的（或者说是反转的）。如果原先的 commit 是“物质”，新的 commit 就是“反物质” — 任何从原先的 commit 里删除的内容会在新的 commit 里被加回去，任何在原先的 commit 里加入的内容会在新的 commit  里被删除。
>
> 这是 Git 最安全、最基本的撤销场景，因为它并不会_改变_历史 — 所以你现在可以  `git push`新的“反转” commit 来抵消你错误提交的 commit。

git撤销操作大全

> 原文：[如何在 Git 里撤销\(几乎\)任何操作](http://blog.jobbole.com/87700)  
> [撤销修改](https://www.liaoxuefeng.com/wiki/0013739516305929606dd18361248578c67b8067c8c017b000/001374831943254ee90db11b13d4ba9a73b9047f4fb968d000)  
> [git add ， git commit 添加错文件 撤销](http://blog.csdn.net/kongbaidepao/article/details/52253774)  
> [Git 的 4 个阶段的撤销更改：](https://mp.weixin.qq.com/s/LBOO0e30LZvY7BHP-TIVog)



