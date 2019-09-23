#136. Single Number
 def singleNumber(self,nums):
     a = 0
     for num in nums:
         a ^= num  #  a = a ^ num
     return a
#这题的终极解法是利用位运算中的异或：x^x = 0, x^0 = x。并且异或有交换律：1^1^0 = 0 = 1^0^1。
#所以如果将全部数字进行异或运算，所有重复元素都会被消除，最后的结果便是那个唯一的数。
#  a += b is equivalent to a = a + b

#169. Majority Element
def majorityElement(self,nums):
    nums.sort()
    return nums[len(nums)//2]
# "//" Floor division - division that results into whole number adjusted to the left in the number line

#190. Reverse Bits
#method1: 先将输入转换成2进制字符串，再翻转并扩充到32位，再将此32位的二进制转为无符号整数即可。
#利用Python的bin()函数很方便。
# bin(): Convert an integer number to a binary string prefixed with “0b”.
#[i], [-i]	Indexing to get a character.The front index begins at 0; back index begins at -1 (=len()-1).
class Solution:
    # @param n, an integer
    # @return an integer
    def reverseBits(self, n):
        b = bin(n)[:1:-1]
        return int(b + '0'*(32-len(b)),2)

#231. Power of Two
class Solution:
    def isPowerOfTwo(self, n):
        """
        :type n: int
        :rtype: bool
        """
        if n < 1:
            return False
        while n%2 == 0:
            n /= 2
        if n==1:
            return True
        else:
            return False

#11. Container With Most Water
#Brute Force
height = [1,8,6,2,5,4,8,3,7]
N = len(height)
max_water = -1
for i in range(N):
    for j in range(i+1,N):
        max_water = max(max_water,min(height[i],height[j])*(j-i))
        print(min(height[i],height[j]),max_water)

###Two Pointers
height = [1,8,6,2,5,4,8,3,7] #[2,3,4,5,18,17,6]
s = 0;e = len(height)-1
max_water = -1
while s < e:
    max_water = max(max_water,(e-s)*min(height[s],height[e]))
    if height[s]< height[e]:
        s += 1
    else: e -= 1
print(max_water)
“”“
#Brute Force
两个循环是：外循环是从第一个数开始，然后内循环是从第二个数到最后一个数；
然后外循环是从第二个数开始，然后内循环是从第三个数到最后一个数； 这样如此内推

1.first(P)：生成用于P的第一个候选解决方案；

2.next(P,c)：生成当前一个解c之后的下一个P的候选解；

3.valid(P,c)：检查候选项c是否为P的解；

4.output(P,c)：将P的解决方案c应用于适当地程序。

另外，“first”步骤也必须在当前解之后不再有P的候选解时给出说明，完成这一点的简单的方法是返回一个“空候选项”，即一些不同于真实候选的常规数据值Λ。同样地，如果实例P没有任何候选项，“first”步骤应该返回Λ。暴力搜索可以用以下算法描述：

c ← first(P)

while c ≠ Λ do

if valid(P,c) then output(P, c)

c ← next(P,c)

end while

#Two pointers related reivew
#https://chocoluffy.com/2016/12/04/%E6%B5%85%E6%9E%90%E7%BB%8F%E5%85%B8%E9%9D%A2%E8%AF%95%E7%AE%97%E6%B3%95%E9%A2%98-two-pointer%E7%9A%84%E8%BF%90%E7%94%A8/

”“”

#1. Two Sum
class Solution:
    def twoSum(self, nums: List[int], target: int) -> List[int]:
        n = len(nums)
        ans = []
        for i in range(n):
            for j in range(n):
                if nums[i] + nums[j] == target:
                    if i != j:
                       ans.append([i,j])
        return ans[0]

class Solution:
    def twoSum(self, nums: List[int], target: int) -> List[int]:
        n = len(nums)
        d = {}
        for i in range(n):
            if target - nums[i] not in d:
                d[nums[i]] = i
            else:
                return [d[target-nums[i]],i]

#2.Add two sum
def addTwoNumbers(self, l1, l2,c = 0):
    val = l1.val + l2.val + c
    c = val //10
    ret = ListNode(val%10)

    if(l1.next != None or l2.next != None or c!=0):
        if l1.next == None:
            l1.next = ListNode(0)
        if l2.next == None:
            l2.next = ListNode(0)
        ret.next = self.addTwoNumbers(l1.next,l2.next,c)
    return ret
#https://zhuanlan.zhihu.com/p/26912413

#3. Longest Substring Without Repeating Characters
class Solution:
    def lengthOfLongestSubstring(self, s: str) -> int:
        ans = []
        length = 0
        for i in range(len(s)):
            if s[i] not in ans:
                ans.append(s[i])
                if len(ans) > length:
                    length = len(ans)
            else:
                for j,k in enumerate(ans):
                    if k == s[i]:
                        ans[j] = ' '
                ans.append(s[i])
                for j,k in enumerate(ans):
                    if k == ' ':
                        ans = ans[j+1:]
                        if len(ans) > length:
                            length = len(ans)
        return length
