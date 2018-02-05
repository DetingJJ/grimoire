ct任务必备技能

5个\*，依次表示：分钟、小时、周、月、年

| 间隔多久执行（功能） | 命令 |
| :--- | :--- |
| 每分钟 | \* \* \* \* \* |
| 每5分钟 | \*/5 \* \* \* \* |
| 每小时 | 0 \* \* \* \* |
| 每周 | 0 0 \* \* 0 |
| 每月 | 0 0 1 \* \* |
| 每年 | 0 0 1 1 \* |

测试命令：

```
*/1 * * * * cd /home/work/src/baidu/high/tt/abcd && sh run.sh >> run.log

0 * * * * cd /home/work/src/baidu/high/tt/abcd && sh splitLog.sh >> splitLog.log
```



