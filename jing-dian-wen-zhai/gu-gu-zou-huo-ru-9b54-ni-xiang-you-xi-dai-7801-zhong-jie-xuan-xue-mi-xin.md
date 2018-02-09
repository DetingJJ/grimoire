> 原文：[https://www.zhihu.com/question/68733553/answer/305463907](https://www.zhihu.com/question/68733553/answer/305463907)
>
> 来源：知乎

## 呱呱走火入魔-逆向游戏代码-终结玄学迷信

看到高票回答里面对物品的使用上的很多猜测，很多都不准确。

为了理解你们的呱**究竟**在干什么，花了五个晚上逆向游戏程序逻辑，提取各种数据。

这里相当于动用了 **上帝视角** 来解答这些问题。



## 我其实是美食博主

这篇知乎首答获得了这么多关注，也让我这个知乎小透明受宠若惊。在这里感谢《旅かえる》的游戏开发者制作出了这么受欢迎的游戏、感谢他、感谢大家的关注，让我蹭了这波热度。

不少知友私信问我是不是游戏行业的从业人员………………………呃…其实……我是美食博主啦：

&lt;

img src="[https://pic3.zhimg.com/50/v2-7f1e5fc34446c66edda3e2f0cad3c72e\_hd.jpg](https://pic3.zhimg.com/50/v2-7f1e5fc34446c66edda3e2f0cad3c72e_hd.jpg)" data-caption="" data-size="small" data-rawwidth="1920" data-rawheight="1371" class="origin\_image zh-lightbox-thumb" width="1920" data-original="[https://pic3.zhimg.com/v2-7f1e5fc34446c66edda3e2f0cad3c72e\_r.jpg](https://pic3.zhimg.com/v2-7f1e5fc34446c66edda3e2f0cad3c72e_r.jpg)"

&gt;

![](https://pic3.zhimg.com/80/v2-7f1e5fc34446c66edda3e2f0cad3c72e_hd.jpg)

[黄小秋：我其实是美食博主 之【旅行青蛙葱蛋饼】zhuanlan.zhihu.com![](https://pic1.zhimg.com/v2-7afaa9fdf23dcae74bc91b3696eb2fe8_180x120.jpg "图标")](https://zhuanlan.zhihu.com/p/33556223)

2018/1/31 更新5

* 更正
  **物品收集阻力的描述**

2018/1/31 更新4

* 更正
  **区域、**
  **目的地选择的逻辑**

2018/1/30 更新3

* 更正
  **收藏品收集概率为 15%，并非 100%**

2018/1/30 更新2

* 增加
  **4.**
  ** 呱在每条路上的耗时是怎么计算的？**

2018/1/30 更新

* 增加 
  **5. 呱离家出走了怎么办？**
* 增加 
  **8. 如何科学使用物品？**
* 增加
  **17.**
  ** 有没有免费获得三叶草的方法？**

2018/1/29 更新

* 增加
  **15.**
  ** 抽奖球的概率是？**

&lt;

img src="[https://pic4.zhimg.com/50/v2-628114cabdc74e1ec79beaa96bae9ae7\_hd.gif](https://pic4.zhimg.com/50/v2-628114cabdc74e1ec79beaa96bae9ae7_hd.gif)" data-caption="" data-size="normal" data-rawwidth="306" data-rawheight="201" data-thumbnail="[https://pic4.zhimg.com/50/v2-628114cabdc74e1ec79beaa96bae9ae7\_hd.jpg](https://pic4.zhimg.com/50/v2-628114cabdc74e1ec79beaa96bae9ae7_hd.jpg)" class="content\_image" width="306"

&gt;

![](https://pic4.zhimg.com/50/v2-628114cabdc74e1ec79beaa96bae9ae7_hd.jpg)

---

1. **呱真的在旅行么？**
2. **呱是如何选择旅行路径的？**
3. **呱是如何旅行的？**
4. **呱在每条路上的耗时是怎么计算的？**
5. **呱离家出走了怎么办？**
6. **道路有哪些属性？**
7. **每件物品都有什么效果？**
8. **如何科学使用物品？**
9. **旅途中会带回哪些明信片？**
10. **旅途中会带回哪些特产？**
11. **朋友什么时候会来访？**
12. **朋友来访应该投喂什么？**
13. **三叶草多久会长好？**
14. **四叶草获得的概率是？**
15. **抽奖球的概率是？**
16. **如何获得成就？**
17. **有没有免费获得三叶草的方法？**

## 呱真的在旅行么？

不得不佩服游戏的设计者，为了追求真实，实现了一套非常完整的旅行模拟系统，有严谨的旅游路线设计。

因为旅行的过程并不展示给用户，我原本以为逻辑会十分简单。发现这套旅行模拟系统的时候，我也有些惊讶，也促使我深入研究这款游戏的逻辑。

&lt;

img src="[https://pic2.zhimg.com/50/v2-41a48c87ffabb11f2b6621d0bcb414a1\_hd.gif](https://pic2.zhimg.com/50/v2-41a48c87ffabb11f2b6621d0bcb414a1_hd.gif)" data-caption="" data-size="normal" data-rawwidth="306" data-rawheight="213" data-thumbnail="[https://pic2.zhimg.com/50/v2-41a48c87ffabb11f2b6621d0bcb414a1\_hd.jpg](https://pic2.zhimg.com/50/v2-41a48c87ffabb11f2b6621d0bcb414a1_hd.jpg)" class="content\_image" width="306"

&gt;

![](https://pic2.zhimg.com/50/v2-41a48c87ffabb11f2b6621d0bcb414a1_hd.jpg)

下面的解释中间会用到少量计算机图论 \(graph theory\) 的术语，但应该还是很直观。

## 呱是如何选择旅行路径的？

程序内建**东、西、南、北**四个区域，呱会选择一个地区旅行

每个区域的设计都是一个**连通的无向图 \(connected undirected graph\)**，而呱的旅行路线就是在图上某两个点之间走出一条**路径 \(path\)**。

通过逆向手段，我提取出了程序中的信息，花了一些时间用 Graphviz 生成了每个地图的样子。

&lt;

img src="[https://pic4.zhimg.com/50/v2-6a5a8b9bfa56d8de53a27ac08136ab53\_hd.jpg](https://pic4.zhimg.com/50/v2-6a5a8b9bfa56d8de53a27ac08136ab53_hd.jpg)" data-size="small" data-rawwidth="2400" data-rawheight="1500" class="origin\_image zh-lightbox-thumb" width="2400" data-original="[https://pic4.zhimg.com/v2-6a5a8b9bfa56d8de53a27ac08136ab53\_r.jpg](https://pic4.zhimg.com/v2-6a5a8b9bfa56d8de53a27ac08136ab53_r.jpg)"

&gt;

![](https://pic4.zhimg.com/80/v2-6a5a8b9bfa56d8de53a27ac08136ab53_hd.jpg)

东部地区

&lt;

img src="[https://pic3.zhimg.com/50/v2-da085ee5e71afca9e68939257e1a8ccf\_hd.jpg](https://pic3.zhimg.com/50/v2-da085ee5e71afca9e68939257e1a8ccf_hd.jpg)" data-size="small" data-rawwidth="2400" data-rawheight="1500" class="origin\_image zh-lightbox-thumb" width="2400" data-original="[https://pic3.zhimg.com/v2-da085ee5e71afca9e68939257e1a8ccf\_r.jpg](https://pic3.zhimg.com/v2-da085ee5e71afca9e68939257e1a8ccf_r.jpg)"

&gt;

![](https://pic3.zhimg.com/80/v2-da085ee5e71afca9e68939257e1a8ccf_hd.jpg)

西部地区

&lt;

img src="[https://pic1.zhimg.com/50/v2-e75acd4a0d94b67d62283135eb78f291\_hd.jpg](https://pic1.zhimg.com/50/v2-e75acd4a0d94b67d62283135eb78f291_hd.jpg)" data-size="small" data-rawwidth="2400" data-rawheight="1500" class="origin\_image zh-lightbox-thumb" width="2400" data-original="[https://pic1.zhimg.com/v2-e75acd4a0d94b67d62283135eb78f291\_r.jpg](https://pic1.zhimg.com/v2-e75acd4a0d94b67d62283135eb78f291_r.jpg)"

&gt;

![](https://pic1.zhimg.com/80/v2-e75acd4a0d94b67d62283135eb78f291_hd.jpg)

南部地区

&lt;

img src="[https://pic3.zhimg.com/50/v2-13355d7e07ee35980bc2d41b219867b9\_hd.jpg](https://pic3.zhimg.com/50/v2-13355d7e07ee35980bc2d41b219867b9_hd.jpg)" data-size="small" data-rawwidth="2400" data-rawheight="1500" class="origin\_image zh-lightbox-thumb" width="2400" data-original="[https://pic3.zhimg.com/v2-13355d7e07ee35980bc2d41b219867b9\_r.jpg](https://pic3.zhimg.com/v2-13355d7e07ee35980bc2d41b219867b9_r.jpg)"

&gt;

![](https://pic3.zhimg.com/80/v2-13355d7e07ee35980bc2d41b219867b9_hd.jpg)

北部地区

图上的每个**节点 \(vertex\)** 都代表了一个地点。每个地点都有可能被蛙经过，并触发一些事件。

除了普通的地点外，还有四种特殊的地点会影响呱旅行的路线：

* **START 起始点（帽绿色）**
* **GOAL 目的地（桃红色）**
* **PATH 途径地（橘黄色）**
* **DETOUR 绕路地（浅黄色）**

连接节点之间的是**边 \(edge\)**，代表连接地点的路，这些路上也会触发 遇上伙伴、拍摄照片 等事件。

每次开始旅行的时候，根据老母亲（？）打包的物品，呱都会：

1. **选择目的地**
   ---

   携带特点食物或道具可以影响到地区的选择，有些物品可以增加特定地区的被选概率，甚至可以直接确定选择的地区。在一个区域内的目的地的选择同样取决于所携带的道具。
   **具体每件物体效果会在后面提到**
   。
2. **选择途径地**
   ---

   途径地由目的地决定，每个地点都有对应的途径地，代码中对此的描述是当地的县府/交通枢纽。
3. **选择绕路地**
   ---

   这个很有意思，我猜测作者的目的是为了让旅途更有多样性，每次路途会额外添加几个地区内绕路地点，携带物品对决定绕路地似乎没有影响。
4. **生成经过所有地点的旅行路径**
   ---

   运用了图论很经典的连通图找最短路径 Dijkstra 算法，配合途径地和绕路地的逻辑，最终计算出旅行路径。

## 目的地是怎么选择的？

&lt;

img src="[https://pic2.zhimg.com/50/v2-95aa0110679d6c6be268b087fc3b5199\_hd.jpg](https://pic2.zhimg.com/50/v2-95aa0110679d6c6be268b087fc3b5199_hd.jpg)" data-size="normal" data-rawwidth="2136" data-rawheight="682" class="origin\_image zh-lightbox-thumb" width="2136" data-original="[https://pic2.zhimg.com/v2-95aa0110679d6c6be268b087fc3b5199\_r.jpg](https://pic2.zhimg.com/v2-95aa0110679d6c6be268b087fc3b5199_r.jpg)"

&gt;

![](https://pic2.zhimg.com/80/v2-95aa0110679d6c6be268b087fc3b5199_hd.jpg)

这里的数值不是绝对概率而是相对的优先级

具体目的地的选择就和携带的道具相关，每个物品对应目的地的优先级与 **区域加成** 叠加就能获得每个地点被选择的概率。

每个目的地的 **区域加成** 初始值都为 30，道具的 **决定地区** 属性值可以提升对应地区内目的地的 **区域加成**，从而增加区域内所有的目的地被选择的概率。

部分道具可以直接限制选择到规定的地区 \(D\)。

## 呱是如何旅行的？

确定了地点之后，呱会开始旅行：

1. 携带物品会决定蛙
   **最长**
   能旅行多久，
   **6 ～ 72 小时不等。**
2. 初始体力由携带物品决定，以 100 为基数提升。

   \*  
   物品的具体属性参考下面的图鉴

3. 经过图上的一条路（边）的时候，道路的地形属性和所携带的物品属性互相作用，会决定呱实际消耗的时间和体力。
4. 路上可能会遇见小伙伴，会在之后的旅行中结伴而行，从而出现在明信片中。
5. 根据路途属性，有一定概率会寄相关的明信片。
6. 当体力不支的时候，蛙必须
   **停下来休息 3 小时**
   ，休息完之后体力会恢复到 100。休息时间也算作旅行时间。
7. 当到达目的
   **或者**
   旅行时间耗尽的时候，蛙就会回家。
8. 1. 回家时会携带三叶草和抽奖券。
   2. 如果在时间耗尽前到达了
      **目的地**
      ，蛙会在此基础上带回当地特产和收藏品。

所以如果你的蛙很久都没回家，回家了也没有带土特产，可能是路途上多次体力不支，晕倒在路边。

&lt;

img src="[https://pic4.zhimg.com/50/v2-8519071aa7d56558474ffef7e52ee958\_hd.gif](https://pic4.zhimg.com/50/v2-8519071aa7d56558474ffef7e52ee958_hd.gif)" data-caption="" data-size="normal" data-rawwidth="306" data-rawheight="210" data-thumbnail="[https://pic4.zhimg.com/50/v2-8519071aa7d56558474ffef7e52ee958\_hd.jpg](https://pic4.zhimg.com/50/v2-8519071aa7d56558474ffef7e52ee958_hd.jpg)" class="content\_image" width="306"

&gt;

![](https://pic4.zhimg.com/50/v2-8519071aa7d56558474ffef7e52ee958_hd.jpg)

## 呱在每条路上的耗时是怎么计算的？

设：  
![](https://www.zhihu.com/equation?tex=t_{\text{way}} "t\_{\text{way}}") 为当前道路 **耗时    
**![](https://www.zhihu.com/equation?tex=t_{\text{plus}} "t\_{\text{plus}}") 为当前道路的 **地形增加耗时    
**![](https://www.zhihu.com/equation?tex=w "w") 为当前道路的 **地形，**![](https://www.zhihu.com/equation?tex=w\in+\left\{+\text{Normal}%2C+\text{Mountain}%2C+\text{Sea}%2C+\text{Cave}+\right\} "w\in \left\{ \text{Normal}, \text{Mountain}, \text{Sea}, \text{Cave} \right\}")![](https://www.zhihu.com/equation?tex=n "n") 为携带物品数量  
![](https://www.zhihu.com/equation?tex=E_{\text{Normal}}%28x%29%2CE_{\text{Mountain}}%28x%29%2CE_{\text{Sea}}%28x%29%2CE_{\text{Cave}}%28x%29%2CE_{\text{All}}%28x%29 "E\_{\text{Normal}}\(x\),E\_{\text{Mountain}}\(x\),E\_{\text{Sea}}\(x\),E\_{\text{Cave}}\(x\),E\_{\text{All}}\(x\)") 依次为携带的第 ![](https://www.zhihu.com/equation?tex=x "x") 件物品中所有具有 普通、山地、大海、洞穴、任意地形**移动速度 的效果值。**

如果当前道路是 普通 地形，则耗时因叠加 **移动速度** 效果而减少：

![](https://www.zhihu.com/equation?tex=t_w%3D+t_{\text{way}}\times\prod_{x%3D1}^{n}{%280.01\times%28100-E_{\text{Normal}}{%28x%29}%29%29}\\ "t\_w= t\_{\text{way}}\times\prod\_{x=1}^{n}{\(0.01\times\(100-E\_{\text{Normal}}{\(x\)}\)\)}\\")  
或者 如果当前道路是 山地、大海、洞穴 地形，基础耗时不变，地形增加耗时因叠加 **移动速度** 效果而减少：  
![](https://www.zhihu.com/equation?tex=t_w%3Dt_{\text{way}}%2Bt_{\text{plus}}\times\prod_{x%3D1}^{n}{%280.01\times%28100-E_{w}{%28x%29}%29%29}\\ "t\_w=t\_{\text{way}}+t\_{\text{plus}}\times\prod\_{x=1}^{n}{\(0.01\times\(100-E\_{w}{\(x\)}\)\)}\\")  
如果携带了 **乳蛋饼 （のびるのキッシュ）**这种 全地形**移动速度** 提升的物品，则会在此基础上再次叠加 **移动速度** 效果：  
![](https://www.zhihu.com/equation?tex=t_{\text{final}}%3Dt_w+\times\prod_{x%3D1}^{n}{%280.01\times%28100-E_{\text{All}}{%28x%29}%29%29}\\ "t\_{\text{final}}=t\_w \times\prod\_{x=1}^{n}{\(0.01\times\(100-E\_{\text{All}}{\(x\)}\)\)}\\")  
最终获得的 ![](https://www.zhihu.com/equation?tex=t_{\text{final}} "t\_{\text{final}}") 就是该条道路上的实际耗时。

## 呱离家出走了怎么办？

如果长时间没有准备便当，包里和桌上都没有食物，呱会愤然离家出走（どこかへ出かけています）。

这个时候在桌子上放上吃的，呱就会在 5～30 分钟内回家。

有趣的是，离家出走也算作成就计算中的旅行次数...emmmm。

## 道路有哪些属性？

连接不同地点之间的每条路 \(edge\) 都有以下几个属性

* **地形**

  四种地形分别是   
  普通、大海、山地、洞穴

* **耗时**

  途径这条路的体力和时间损耗，分为基础耗时和地形增加耗时

  呱需要跋山涉水自然会耗时久一点

* **明信片概率**

  ---

  明信片上不同元素出现的概率

  据说所有的地图元素都有真实原型

* **遇见伙伴**
  ---

  遇见特定伙伴的概率

具体如下，不能再详细了

&lt;

img src="[https://pic1.zhimg.com/50/v2-7415bade0ede80076d3ca63a7d2a4c35\_hd.jpg](https://pic1.zhimg.com/50/v2-7415bade0ede80076d3ca63a7d2a4c35_hd.jpg)" data-caption="" data-size="small" data-rawwidth="1445" data-rawheight="8646" class="origin\_image zh-lightbox-thumb" width="1445" data-original="[https://pic1.zhimg.com/v2-7415bade0ede80076d3ca63a7d2a4c35\_r.jpg](https://pic1.zhimg.com/v2-7415bade0ede80076d3ca63a7d2a4c35_r.jpg)"

&gt;

![](https://pic1.zhimg.com/80/v2-7415bade0ede80076d3ca63a7d2a4c35_hd.jpg)

## 每件物品都有什么效果？

奉上这张吐血整理的物品效果图鉴：

&lt;

img src="[https://pic1.zhimg.com/50/v2-ac9de692ddf463e7838b1c007ab578dc\_hd.jpg](https://pic1.zhimg.com/50/v2-ac9de692ddf463e7838b1c007ab578dc_hd.jpg)" data-caption="" data-size="normal" data-rawwidth="3826" data-rawheight="3581" class="origin\_image zh-lightbox-thumb" width="3826" data-original="[https://pic1.zhimg.com/v2-ac9de692ddf463e7838b1c007ab578dc\_r.jpg](https://pic1.zhimg.com/v2-ac9de692ddf463e7838b1c007ab578dc_r.jpg)"

&gt;

![](https://pic1.zhimg.com/80/v2-ac9de692ddf463e7838b1c007ab578dc_hd.jpg)

&lt;

img src="[https://pic3.zhimg.com/50/v2-589b369c1564310488c541d7da42b992\_hd.jpg](https://pic3.zhimg.com/50/v2-589b369c1564310488c541d7da42b992_hd.jpg)" data-caption="" data-size="small" data-rawwidth="1145" data-rawheight="682" class="origin\_image zh-lightbox-thumb" width="1145" data-original="[https://pic3.zhimg.com/v2-589b369c1564310488c541d7da42b992\_r.jpg](https://pic3.zhimg.com/v2-589b369c1564310488c541d7da42b992_r.jpg)"

&gt;

![](https://pic3.zhimg.com/80/v2-589b369c1564310488c541d7da42b992_hd.jpg)

有五类不同的物品

* **便当**
  ---

  商店购买或者抽奖获得的食物
* **幸运符**
  ---

  除了四叶草和可以购买的幸 \(tǔ\) 运 \(háo\) 铃之外，都要抽奖获得
* **道具**
  ---

  商店购买
* **特产**
  ---

  呱旅游时获得
* **收藏品**
  ---

  特别的特产，通常在县府获得，无法使用

属性分类

* **HP**
* * **最大时间（小时**  
    ）

    决定蛙的旅行时间

  * **初始体力提升（%）**

    增加一开始  
    一鼓作气  
    能旅行的距离

  * **随机体力提升（%）**

    随机额外增加体力提升的最高百分点
* **物品几率**
* * **三叶草**

    获得三叶草数量

  * **额外随机三叶草**

    随机额外获得的最大三叶草数量

  * **抽奖券**

    奖券数量

  * **物品收集阻力**

    减少收集阻力，增加获得目的地  
    收藏品  
    的概率
* **决定地区**

  对应地区被选中的概率，如果值为 D 则可以直接决定目的地所在区域

* **移动速度**

  根据地形不同，提升移动速度，减少途径所耗费的时间，在相同旅行时间内可以走更远

* **朋友**

  遇到特定旅行伙伴的概率

* **遭遇地形**

  途径特定地形时候获得相应明信片的概率

* **FLAG 属性**

  立一些特定的 Flag，主要影响成就系统，下面会写到

## 如何科学使用物品？

&lt;

img src="[https://pic1.zhimg.com/50/v2-639c8d930850a0e2ccf3d73595707ffc\_hd.gif](https://pic1.zhimg.com/50/v2-639c8d930850a0e2ccf3d73595707ffc_hd.gif)" data-caption="" data-size="normal" data-rawwidth="306" data-rawheight="222" data-thumbnail="[https://pic1.zhimg.com/50/v2-639c8d930850a0e2ccf3d73595707ffc\_hd.jpg](https://pic1.zhimg.com/50/v2-639c8d930850a0e2ccf3d73595707ffc_hd.jpg)" class="content\_image" width="306"

&gt;

![](https://pic1.zhimg.com/50/v2-639c8d930850a0e2ccf3d73595707ffc_hd.jpg)

这里用几个例子来展示物品和路线结合的效果

1. **决定想去的地区**

   ---

   携带的便当和抽奖获得的护身符（お守り）可以提升选择特定地区的概率。 抽奖获得的车票（きっぷ）可以  
   **直接决定**  
   所去到的地区。

   **例：**  
   想去北方，使用  
   **北国きっぷ。**

2. **影响路途的距离和时间**
   ---

   带 
   **最大时间**
    值高的食物吃走得远，带 
   **体力提升**
    值高的食物吃走得快耗时少。
3. **快速通过沿途路线的地形**

   ---

   带有地区速度加成的食物或者道具，可以增加特定地形的移动速度。

   不同物品的   
   **移动速度**  
    效果可以叠加，详情查看上面的解释。

4. **匹配在道路上遇到的伙伴**
   ---

   如果在途径会遭遇伙伴的道路，特定物品可以增加实际遭遇概率
   ---

   **例：**
   抽奖抽到的黄色ぼうろ（饼干）可以增加路途中遇到螃蟹的几率。

## 综合运用（敲黑板！！！）

**呱想去秋田県男鹿市看灯塔**

1. 在地图上找到 秋田県（3022） 在北方。
2. 便当选择 
   **あさつきのピロシキ （葱饼？）**
   可以提升去北方的概率。
3. 携带 
   **青色のお守り （蓝色护身符）**
   可以提升去北方的概率。
4. 如果有 
   **北国きっぷ（北方车票？）**
   可以直接决定去北方，上面的便当和护身符可以换别的。
5. 通过目的地概率表发现携带各类帐篷前往 3022 目的地的概率更高。
6. 查看可能的路线发现从起始点 3000 到 3022 之间会途径很多山路。
7. 携带 
   **ハイテクテント （高级帐篷？）**
   增加山地移动速度更显著。
8. 如果还有空余，可以带上 
   **よつ葉（四叶草）**
   或者 
   **幸運の鈴**
   ，提升带回物品的概率。

&lt;

img src="[https://pic1.zhimg.com/50/v2-24d00a5015507fd212aa77504813b9de\_hd.jpg](https://pic1.zhimg.com/50/v2-24d00a5015507fd212aa77504813b9de_hd.jpg)" data-caption="" data-size="normal" data-rawwidth="500" data-rawheight="350" class="origin\_image zh-lightbox-thumb" width="500" data-original="[https://pic1.zhimg.com/v2-24d00a5015507fd212aa77504813b9de\_r.jpg](https://pic1.zhimg.com/v2-24d00a5015507fd212aa77504813b9de_r.jpg)"

&gt;

![](https://pic1.zhimg.com/80/v2-24d00a5015507fd212aa77504813b9de_hd.jpg)

## 旅途中会带回哪些明信片？

途径每条道路上会遇到的明信片元素都有很明确的概率。

普通的明信片是自动合成的。根据道路元素、所携带道具、遇到的同行小伙伴，程序会选择合适的背景、前景和呱和小伙伴的 pose，合成完整的明信片。粗略计算，有 120 种左右的组合。

&lt;

img src="[https://pic3.zhimg.com/50/v2-f693541dcd6ff01bf573029bdd84229a\_hd.jpg](https://pic3.zhimg.com/50/v2-f693541dcd6ff01bf573029bdd84229a_hd.jpg)" data-size="normal" data-rawwidth="1350" data-rawheight="600" class="origin\_image zh-lightbox-thumb" width="1350" data-original="[https://pic3.zhimg.com/v2-f693541dcd6ff01bf573029bdd84229a\_r.jpg](https://pic3.zhimg.com/v2-f693541dcd6ff01bf573029bdd84229a_r.jpg)"

&gt;

![](https://pic3.zhimg.com/80/v2-f693541dcd6ff01bf573029bdd84229a_hd.jpg)

几种不同的 pose

有一些带有特定的故事情节明信片是单张绘制的，这里也可以看出游戏制作者的用心：迷路和小伙伴看地图通常出现在地图的边缘，冷清下水道一般出现在四通八达的城市交通枢纽。

&lt;

img src="[https://pic1.zhimg.com/50/v2-e94a712c25d9bf6cd637a4a2c444e1b8\_hd.jpg](https://pic1.zhimg.com/50/v2-e94a712c25d9bf6cd637a4a2c444e1b8_hd.jpg)" data-size="normal" data-rawwidth="500" data-rawheight="350" class="origin\_image zh-lightbox-thumb" width="500" data-original="[https://pic1.zhimg.com/v2-e94a712c25d9bf6cd637a4a2c444e1b8\_r.jpg](https://pic1.zhimg.com/v2-e94a712c25d9bf6cd637a4a2c444e1b8_r.jpg)"

&gt;

![](https://pic1.zhimg.com/80/v2-e94a712c25d9bf6cd637a4a2c444e1b8_hd.jpg)

迷路的呱呱

&lt;

img src="[https://pic4.zhimg.com/50/v2-67f15a21eceffc257c625238749e2ff9\_hd.jpg](https://pic4.zhimg.com/50/v2-67f15a21eceffc257c625238749e2ff9_hd.jpg)" data-size="normal" data-rawwidth="500" data-rawheight="350" class="origin\_image zh-lightbox-thumb" width="500" data-original="[https://pic4.zhimg.com/v2-67f15a21eceffc257c625238749e2ff9\_r.jpg](https://pic4.zhimg.com/v2-67f15a21eceffc257c625238749e2ff9_r.jpg)"

&gt;

![](https://pic4.zhimg.com/80/v2-67f15a21eceffc257c625238749e2ff9_hd.jpg)

路边的排水渠

## 旅途中会带回哪些特产？

上面提到了，成功到达**目的地（GOAL）**的时候才会获得特产，收藏品的获得的基础概率是 15%，使用 **四叶草** 或者 **幸运铃铛** 可以减少收集收藏品的阻力，增加获得概率。其他物品的概率如下：

&lt;

img src="[https://pic1.zhimg.com/50/v2-5d933b42fae69f6802ffaba864d42fc8\_hd.jpg](https://pic1.zhimg.com/50/v2-5d933b42fae69f6802ffaba864d42fc8_hd.jpg)" data-caption="" data-size="small" data-rawwidth="1195" data-rawheight="5881" class="origin\_image zh-lightbox-thumb" width="1195" data-original="[https://pic1.zhimg.com/v2-5d933b42fae69f6802ffaba864d42fc8\_r.jpg](https://pic1.zhimg.com/v2-5d933b42fae69f6802ffaba864d42fc8_r.jpg)"

&gt;

![](https://pic1.zhimg.com/80/v2-5d933b42fae69f6802ffaba864d42fc8_hd.jpg)

游戏代码中有收藏品收集三次必定成功的设定，但是实际上并未启用，可能在之后的版本中会引入

## 朋友什么时候会来访？

蜗牛、蜜蜂和乌龟会时不时来访。来访停留的时间 180～270 分钟。

**蜜蜂需要有至少 3 件收藏品才会出现，乌龟需要有至少 6 件收藏品。**

## 朋友来访应该投喂什么？

给来访的朋友投喂会获得三叶草和抽奖券的回礼：

&lt;

img src="[https://pic4.zhimg.com/50/v2-42ca38c99c94b36574c7fa7c02124490\_hd.jpg](https://pic4.zhimg.com/50/v2-42ca38c99c94b36574c7fa7c02124490_hd.jpg)" data-caption="" data-size="small" data-rawwidth="676" data-rawheight="328" class="origin\_image zh-lightbox-thumb" width="676" data-original="[https://pic4.zhimg.com/v2-42ca38c99c94b36574c7fa7c02124490\_r.jpg](https://pic4.zhimg.com/v2-42ca38c99c94b36574c7fa7c02124490_r.jpg)"

&gt;

![](https://pic4.zhimg.com/80/v2-42ca38c99c94b36574c7fa7c02124490_hd.jpg)

在此基础上，投喂带有稀有 FLAG 属性的物品会多获得 20 根三叶草，多获得 1～4 张抽奖券。

朋友会记住最近三次的食品。连续投喂同一种物品，获得回礼的数量会降低。

**为了达到最好效果，最好换四种不同的礼物轮流投喂**，具体可以参照下面的喜好表格：

&lt;

img src="[https://pic4.zhimg.com/50/v2-61ec1f27a581a73c7deb30474ffb1c17\_hd.jpg](https://pic4.zhimg.com/50/v2-61ec1f27a581a73c7deb30474ffb1c17_hd.jpg)" data-caption="" data-size="small" data-rawwidth="800" data-rawheight="2081" class="origin\_image zh-lightbox-thumb" width="800" data-original="[https://pic4.zhimg.com/v2-61ec1f27a581a73c7deb30474ffb1c17\_r.jpg](https://pic4.zhimg.com/v2-61ec1f27a581a73c7deb30474ffb1c17_r.jpg)"

&gt;

![](https://pic4.zhimg.com/80/v2-61ec1f27a581a73c7deb30474ffb1c17_hd.jpg)

## 三叶草多久会长好？

花坛中总共有 20 根三叶草。

三叶草割完之后重生的时间是遵循 ![](https://www.zhihu.com/equation?tex=\mu%3D7200，\sigma%3D1800 "\mu=7200，\sigma=1800") 的正态分布在 ![](https://www.zhihu.com/equation?tex=[300%2C+14400] "\[300, 14400\]") 的区间：

&lt;

img src="[https://pic3.zhimg.com/50/v2-d455a65b3b15866e5a8f8717ef0a7406\_hd.jpg](https://pic3.zhimg.com/50/v2-d455a65b3b15866e5a8f8717ef0a7406_hd.jpg)" data-caption="" data-size="normal" data-rawwidth="576" data-rawheight="333" class="origin\_image zh-lightbox-thumb" width="576" data-original="[https://pic3.zhimg.com/v2-d455a65b3b15866e5a8f8717ef0a7406\_r.jpg](https://pic3.zhimg.com/v2-d455a65b3b15866e5a8f8717ef0a7406_r.jpg)"

&gt;

![](https://pic3.zhimg.com/80/v2-d455a65b3b15866e5a8f8717ef0a7406_hd.jpg)

**每一根都是独立重生的。最短 5 分钟 \(300 秒\)，最长 4 小时 \(14400 秒\) 重生。**

## 四叶草获得的概率是？

完成教程后会自动诞生第一颗四叶草，除此之外，每一根三叶草重生的时候都有 **1%** 的概率成为四叶草。

## 抽奖球的概率是？

* 白：60%
* 蓝：27%
* 绿：9%
* 红：3%
* 金：1%

## 如何获得成就？

蛙旅行的时候会立一些 Flag，我从代码中整理了一下触发的条件：

&lt;

img src="[https://pic1.zhimg.com/50/v2-d7e606bc6c49621bf8861d4c70b03c95\_hd.jpg](https://pic1.zhimg.com/50/v2-d7e606bc6c49621bf8861d4c70b03c95_hd.jpg)" data-caption="" data-size="small" data-rawwidth="641" data-rawheight="732" class="origin\_image zh-lightbox-thumb" width="641" data-original="[https://pic1.zhimg.com/v2-d7e606bc6c49621bf8861d4c70b03c95\_r.jpg](https://pic1.zhimg.com/v2-d7e606bc6c49621bf8861d4c70b03c95_r.jpg)"

&gt;

![](https://pic1.zhimg.com/80/v2-d7e606bc6c49621bf8861d4c70b03c95_hd.jpg)

这也是玄学错误迷信的一个地方。使用称呼对游戏其他部分没有任何影响，不会改变获得物品和明信片获得概率，也不会影响出门时长。

## 有没有免费获得三叶草的方法？

你猜？

&lt;

img src="[https://pic2.zhimg.com/50/v2-4d9e1a01ff1ddc43e9b82d0a676cc36c\_hd.gif](https://pic2.zhimg.com/50/v2-4d9e1a01ff1ddc43e9b82d0a676cc36c_hd.gif)" data-caption="" data-size="normal" data-rawwidth="306" data-rawheight="217" data-thumbnail="[https://pic2.zhimg.com/50/v2-4d9e1a01ff1ddc43e9b82d0a676cc36c\_hd.jpg](https://pic2.zhimg.com/50/v2-4d9e1a01ff1ddc43e9b82d0a676cc36c_hd.jpg)" class="content\_image" width="306"

&gt;

![](https://pic2.zhimg.com/50/v2-4d9e1a01ff1ddc43e9b82d0a676cc36c_hd.jpg)

---

持续更新，欢迎在评论区提问。

