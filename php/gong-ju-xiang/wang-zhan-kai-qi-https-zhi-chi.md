现在，你应该能在访问 [https://konklone.com](https://konklone.com) 的时候，在地址栏里看到一个漂亮的小绿锁![](http://static.oschina.net/uploads/img/201309/26075158_Itfq.png)了，因为我把这个网站换成了HTTPS协议。一分钱没花就搞定了。

为什么要使用HTTPS协议：

* 虽然SSL并不是无懈可击的，但是我们应该[尽可能提高窃听成本](http://www.theguardian.com/world/2013/sep/05/nsa-how-to-remain-secure-surveillance)
* 加密通讯不应心存侥幸，[所有连接都应被加密](http://www.tbray.org/ongoing/When/201x/2012/12/02/HTTPS)
* 福利： 使用了HTTPS之后，如果网站的访客是从其他已经使用了HTTPS的网站上跳转过来，你就能在Google Analytics中获取[更完整的来源信息](http://stackoverflow.com/a/1361720/16075)（比如[Hacker News](https://news.ycombinator.com/)）。

本文将为您说明，如何通过开启您网站上的HTTPS协议来为构建和谐、安全的互联网添砖加瓦。尽管步骤有些多，但是每个步骤都很简单，聪明的你应该能在**1个小时之内**搞定这个事情。

概要: 目前想在 web 上使用 HTTPS 的话, 你需要获得一个证书文件, 该证书由一个受浏览器信任的公司所签署. 一旦你获得了它, 你就在你的 web 服务器上指定其所在的位置, 以及与你关联的私钥的位置, 并开启 443 端口准备使用. 你不需要是一个专业级软件开发人员来做这个, 但是你需要**熟练使用命令行操作**, 并能熟练的配置**你操控的服务器**.

大部分的证书都是要钱的, 但是我听从了 Micah Lee 的[建议](https://twitter.com/micahflee/status/368163493049933824)后用了[StartSSL](https://www.startssl.com/). 那也是[EFF](https://www.eff.org/)正在使用的, 而且**他们针对个人的基础型证书是免费的**. \(他们会要求你去支付一个更高级的证书如果你的站点实际上是商业站点的话.\) 值得注意的是他们的网站在一开始使用的时候很难用 — 尤其是如果你对于潜藏在 SSL 幕后的概念和术语还很陌生的话\(就像我一样\). 幸运的是, 其实并不像想象中的那么难, 只是会有很多细微的步骤而已.

下面, 我们将一步步的从注册开始直到创建属于你的证书. 我们也会覆盖在 nginx 环境下的安装知识, 但是你可以在任何你希望使用的 web 服务器上使用该证书.

## 注册StartSSL {#content_h2_3_5}

开始,[访问注册页面](https://www.startssl.com/?app=11&action=regform) 输入你的信息

![](/assets/import--2018年04月12日10:36:06.png)

他们会通过email发给你个验证码。在这期间不要关闭选项卡或浏览器 , 所以你只要保持打开状态，知道获得验证码并贴上它。

![](/assets/import-2018年04月12日10:36:29.png)

等待几分钟就能获得整数了。一旦通过申请，他们会发送一封带有特殊连接和验证码的email给你

完成之后会给你一个私人密钥，在他们的服务器上生成的私人密钥,但这不是你创建**SSL**证书的密钥.他们用这个私人密钥生成一个单独的"认证证书"，以后你可以用它来登录StartSSL的控制面板，下面你将要为你的网站创建一个整数了。

![](/assets/import--sj22018年04月12日10:37:17.png)

最后他们会叫你安装证书

![](http://static.oschina.net/uploads/img/201309/26075200_dZp5.png)

在你的浏览器上安装验证证书

![](http://static.oschina.net/uploads/img/201309/26075200_7px3.png)

要是你用的的Chrome 你将会在浏览器头看到下面信息

![](http://static.oschina.net/uploads/img/201309/26075201_kFMG.png)

再次,这只是证明你在登录StartSSL 以后通过你的邮件里的地址跳转到这个页面

现在，我们需要使得StartSSL相信我们拥有自己的域名，我们想要为他生成一个新的证书。从控制面板中，点击“Validations Wizard”，然后在下拉表单中选择”Domain Name Validation“选项。

![](http://static.oschina.net/uploads/img/201309/26075202_D0EB.png)

输入你的域名。

![](http://static.oschina.net/uploads/img/201309/26075202_CpFg.png)

接下来，你要选择一个email地址，StartSSL将要用它来核实你的域名地址。正如你所见的，StartSSL将会相信你是拥有这个域名的，如果你能用域名控制[webmaster@,postmaster](mailto:webmaster@,postmaster)@, orhostmaster@或者是你的email地址已被列为域名注册人信息的一部分（就我而言，就是当前的这个[konklone@gmail.com](mailto:konklone@gmail.com)）。然后选择一个你可以收到邮箱的邮箱地址。

![](http://static.oschina.net/uploads/img/201309/26075203_FNSx.png)

他们会给你发送一个验证码，你可以把它输入到文本框中来验证你的域名。

![](http://static.oschina.net/uploads/img/201309/26075203_koex.png)

## 生成证书 {#content_h2_5_5}

现在 StartSSL知道你是谁了，知道了你的域名，你可以用你的私人密钥来生成证书了。

这时StartSSL能为你生成一个私人密钥— 在他们常见问题中（FAQ）像你保证他们只生成[高质量的随机密钥](https://www.startssl.com/?app=25#43)，并且以后不会作为其他的密钥 — 你也可以自己创建一个，很简单。

这将会引导你通过命令行创建via。当你选择 StartSSL的引导,你可以按引导步奏进行备份，在你为域名申请证书的地方。

打开终端，创建一个新的 2048-bit RSA 密钥

openssl genrsa -aes256 -out my-private-encrypted.key 2048

会让你输入一个密码.[选择一个](http://xkcd.com/936/),并记住它 .这会产生一个加密的私钥 ，如果你需要通过网络转移你的密钥，就可以用这个加密的版本..

下一步是将其解码, 从而通过它生成一个“证书签发请求”. 使用如下命令来解码你的私钥:

openssl rsa -in my-private-encrypted.key -out my-private-decrypted.key

然后, 生成一个证书签发请求:

openssl req -new -key my-private-decrypted.key -out mydomain.com.csr

回到 StartSSL 的控制面板并单击 “Certificates Wizard” 标签, 然后在下拉列表里选择 “Web Server SSL/TLS Certificate”.

![](http://static.oschina.net/uploads/img/201309/26075204_a1Qu.png)

由于我们已经生成了自己的私钥, 所以你可以在此单击 “**Skip**”.

![](http://static.oschina.net/uploads/img/201309/26075205_kX3f.png)

然后, 在文本框内粘贴入我们之前生成的 .csr 文件里面的内容.

![](http://static.oschina.net/uploads/img/201309/26075205_mxPM.png)

如果一切正常的话, 它就会提示你说已经收到了你发出的证书签发请求.

![](http://static.oschina.net/uploads/img/201309/26075205_Dkzv.png)

现在, 选择你之前已经验证过的计划使用证书的域名.

![](http://static.oschina.net/uploads/img/201309/26075207_xBiq.png)

它会要求你添加一个子域, 我给自己的添加的是 “www”.

![](http://static.oschina.net/uploads/img/201309/26075207_6bUi.png)

它会要求你进行确认, 如果看上去没错的话, 单击 “Continue”.

![](http://static.oschina.net/uploads/img/201309/26075207_ksJL.png)

**注意:**在你等待通过邮件获得许可的那儿, 你有可能会遇到一个 "需要额外的验证!" 的步骤, 第一次的时候我没有遇到, 但是第二次的时候遇到了, 然后我的许可在大概30分钟左右被批准, 一旦经过许可, 你需要去单击 "Tool Box" 标签页并通过 "Retrieve Certificate" 来获取你的证书.

然后应该会是这样 — 你的证书将出现在一个文本域里面供你去复制并粘贴到一个文件里去, 给这个文件随便起个你想叫的名字就行, 但是在本指南接下来的部分里将以 mydomain.com.crt 这个名字去引用它\(译者注, 原文为 asmydomain.com.crt, 参照下文 mydomain.com.crt 名称来看, 应为as后未加空格导致的拼写错误\).

## 在nginx中安装证书 {#content_h2_7_5}

首先, 确认443端口在你的web服务器中已经打开。许多web托管已经默认为你打开了该端口。如果你使用Amazon AWS,你需要确在你的实例安全组中443端口是开放的。

下一步，我们将要创建web服务器要使用的“证书链”。它包含你的证书和StartSSL中介证书（将StartSSL的跟证书包含进来不是必要的，因为浏览器已经包含了该证书）StartSSL下载中介证书：

wget [http://www.startssl.com/certs/sub.class1.server.ca.pem](http://www.startssl.com/certs/sub.class1.server.ca.pem)

然后将你的证书和他们的证书连接起来：

cat mydomain.com.crt sub.class1.server.ca.pem &gt; unified.crt

最后，告诉你的Web服务器你的统一证书和你的解密密钥。 我使用nginx——下面是你需要的nginx的最要配置。它使用301永久重定向将所有的HTTP请求从定向为HTTPS 请求，然后指引服务器使用证书要密钥。

```
server {
    listen 80;
    server_name konklone.com;
    return 301 https://$host$request_uri;
}

server {
    listen 443 ssl;
    server_name konklone.com;

    ssl_certificate /path/to/unified.crt;
    ssl_certificate_key /path/to/my-private-decrypted.key;
}

# for a more complete, secure config: 
#   https://gist.github.com/konklone/6532544
```

你可以获得一个[更全面的nigix配置](https://gist.github.com/konklone/6532544)，他打开了[SPDY](http://www.chromium.org/spdy/spdy-whitepaper),[HSTS](https://en.wikipedia.org/wiki/HTTP_Strict_Transport_Security), SSL[session resumption](https://code.google.com/p/sslyze/wiki/SessionResumption), 和[Perfect Forward Secrecy](https://www.eff.org/deeplinks/2013/08/pushing-perfect-forward-secrecy-important-web-privacy-protection).

Qualys' SSL 实验室提供了完美的[SSL](https://www.ssllabs.com/ssltest/analyze.html)[测试工具](https://www.ssllabs.com/ssltest/analyze.html)， 你可以通过它看到你正在做的事情.

现在, 检验你对nginx的配置是正确的 \(这也检验密钥和证书工作正常\):

sudo nginx -t

然后启动 nginx:

sudo service nginx restart

稍等片刻，在你的浏览器中测试。如果进展顺利，![](http://static.oschina.net/uploads/img/201309/26075158_Itfq.png)会在你的浏览器中出现

