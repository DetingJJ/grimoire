浮点型（也叫浮点数 float，双精度数 double 或实数 real）可以用以下任一语法定义：

```php
$a = 1.234; 
$b = 1.2e3; 
$c = 7E-10;
```

**浮点数的形式表示：**

LNUM \[0-9\]+

DNUM \(\[0-9\]\*\[.\]{LNUM}\) \| \({LNUM}\[.\]\[0-9\]\*\)

EXPONENT\_DNUM \[+-\]?\(\({LNUM} \| {DNUM}\) \[eE\]\[+-\]? {LNUM}\)

浮点数的字长和平台相关，尽管通常最大值是 1.8e308 并具有 14 位十进制数字的精度（64 位 IEEE 格式）。

**浮点数的精度**

浮点数的精度有限。尽管取决于系统，PHP 通常使用 IEEE 754 双精度格式，则由于取整而导致的最大相对误差为 1.11e-16。非基本数学运算可能会给出更大误差，并且要考虑到进行复合运算时的误差传递。

此外，以十进制能够精确表示的有理数如 0.1 或 0.7，无论有多少尾数都不能被内部所使用的二进制精确表示，因此不能在不丢失一点点精度的情况下转换为二进制的格式。这就会造成混乱的结果：例如，floor\(\(0.1+0.7\)\*10\) 通常会返回 7 而不是预期中的 8，因为该结果内部的表示其实是类似 7.9999999999999991118...。

所以永远不要相信浮点数结果精确到了最后一位，也永远不要比较两个浮点数是否相等。如果确实需要更高的精度，应该使用任意精度数学函数或者 gmp 函数。

---

**BC 数学 函数：**

```
bcadd — 2个任意精度数字的加法计算
bccomp — 比较两个任意精度的数字
bcdiv — 2个任意精度的数字除法计算
bcmod — 对一个任意精度数字取模
bcmul — 2个任意精度数字乘法计算
bcpow — 任意精度数字的乘方
bcpowmod — Raise an arbitrary precision number to another, reduced by a specified modulus
bcscale — 设置所有bc数学函数的默认小数点保留位数
bcsqrt — 任意精度数字的二次方根
bcsub — 2个任意精度数字的减法
```

**gmp 函数：**

```
gmp_abs — Absolute value
gmp_add — Add numbers
gmp_and — Bitwise AND
gmp_clrbit — Clear bit
gmp_cmp — Compare numbers
gmp_com — Calculates one's complement
gmp_div_q — Divide numbers
gmp_div_qr — Divide numbers and get quotient and remainder
gmp_div_r — Remainder of the division of numbers
gmp_div — 别名 gmp_div_q
gmp_divexact — Exact division of numbers
gmp_export — Export to a binary string
gmp_fact — Factorial
gmp_gcd — Calculate GCD
gmp_gcdext — Calculate GCD and multipliers
gmp_hamdist — Hamming distance
gmp_import — Import from a binary string
gmp_init — Create GMP number
gmp_intval — Convert GMP number to integer
gmp_invert — Inverse by modulo
gmp_jacobi — Jacobi symbol
gmp_legendre — Legendre symbol
gmp_mod — Modulo operation
gmp_mul — Multiply numbers
gmp_neg — Negate number
gmp_nextprime — Find next prime number
gmp_or — Bitwise OR
gmp_perfect_square — Perfect square check
gmp_popcount — Population count
gmp_pow — Raise number into power
gmp_powm — Raise number into power with modulo
gmp_prob_prime — Check if number is "probably prime"
gmp_random_bits — Random number
gmp_random_range — Random number
gmp_random_seed — Sets the RNG seed
gmp_random — Random number
gmp_root — Take the integer part of nth root
gmp_rootrem — Take the integer part and remainder of nth root
gmp_scan0 — Scan for 0
gmp_scan1 — Scan for 1
gmp_setbit — Set bit
gmp_sign — Sign of number
gmp_sqrt — Calculate square root
gmp_sqrtrem — Square root with remainder
gmp_strval — Convert GMP number to string
gmp_sub — Subtract numbers
gmp_testbit — Tests if a bit is set
gmp_xor — Bitwise XOR
```

---

**比较浮点数:**

如上述警告信息所言，由于内部表达方式的原因，比较两个浮点数是否相等是有问题的。不过还是有迂回的方法来比较浮点数值的。要测试浮点数是否相等，要使用一个仅比该数值大一丁点的最小误差值。该值也被称为机器极小值（epsilon）或最小单元取整数，是计算中所能接受的最小的差别值。

$a 和 $b 在小数点后五位精度内都是相等的。

```
$a = 1.23456789;
$b = 1.23456780;
$epsilon = 0.00001;

if(abs($a-$b) <$epsilon) {
    echo "true";
}
```



