Algorithm
#Counting Valley
import math
import os
import random
import re
import sys

# Complete the countingValleys function below.
def countingValleys(n, s):
    val = 0
    level = 0
    for i in s:
        if i == 'U':
            level += 1
            if level == 0:
                val += 1
        else:
            level -= 1
    return val

#Sock Merchant
from collections import Counter
# Complete the sockMerchant function below.
def sockMerchant(n, ar):
    ar_counter = Counter(ar)
    ar_items = ar_counter.items()
    my_list = []
    for k,v in ar_items:
        my_list.append(v)
    total = 0
    for i in my_list:
        if i > 1:
            cnt = i //2
            total += cnt
    print(total)
    return total

#Jumping on the clouds
def jumpingOnClouds(c):
    i = 0
    jumps = 0
    while i < len(c)-1:
        if i+2 < len(c) and c[i+2] != 1:
            i += 1
        jumps += 1
        i += 1
    return jumps

#Repeated String
def repeatedString(s, n):
    a_cnt = s.count('a')
    num = n//len(s)
    mod = n%len(s)
    count = a_cnt*num + s[:mod].count('a')
    return count

# Mini-Max Sum
def miniMaxSum(arr):
    min_num = min(arr)
    max_num = max(arr)
    min_sum = 0
    max_sum = 0
    for i in arr:
        i = int(i)
        if i > min_num:
            min_sum += i
    for i in arr:
        i = int(i)
        if i < max_num:
            max_sum += i
    for i in arr:
        if min_num == max_num:
            min_sum = max_sum = (len(arr) -1) * min_num
    print(max_sum,min_sum)
    return min_sum,max_sum

#Grading Studetns
def gradingStudents(grades):
    for i in range(len(grades)):
        if grades[i] >= 38:
            if grades[i]%5 != 0:
                if 5 - grades[i]%5 < 3:
                    grades[i] += (5-grades[i]%5)
    return grades

#apple and orange
def countApplesAndOranges(s, t, a, b, apples, oranges):
    #print(house)
    a_list = []
    b_list = []
    for i in apples:
        num1 = a + i
        #print(num1)
        if s <= num1 <= t:
            a_list.append(num1)
    for i in oranges:
        num2 = b + i
        #print(num2)
        if s <= num2 <= t:
            b_list.append(num2)
    print(len(a_list))
    print(len(b_list))
    return len(a_list),len(b_list)

#Kangaroo
def kangaroo(x1, v1, x2, v2):
    if (v1>v2) and (x2-x1)%(v1-v2) == 0:
        ans = 'YES'
    else:
        ans = 'NO'
    return ans

#Breaking Records
def breakingRecords(scores):
    min_cnt = 0
    max_cnt = 0
    max_score = scores[0]
    min_score = scores[0]
    for i in range(len(scores)):
        if scores[i] > max_score:
             max_cnt += 1
             max_score = scores[i]
        elif scores[i] < min_score:
            min_cnt += 1
            min_score = scores[i]
    return max_cnt,min_cnt

#Divisible Sum Pairs
def divisibleSumPairs(n, k, ar):
    cnt = 0
    for i in range(len(ar)):
        for j in range(len(ar)):
            if i < j:
                sumNum = ar[i] + ar[j]
                if sumNum %k == 0:
                    cnt += 1
    return cnt

#Migratory Birds
def migratoryBirds(arr):
    type = []
    for i in range(1,6):
        type.append(arr.count(i))
        i += 1
    #print(type)
    max_val = max(type)
    ans = type.index(max_val) + 1
    print(ans)

#Between Two Sets
from functools import reduce
def gcd(a,b):
    while a%b != 0:
        a,b = b,(a%b)
    return b
def lcm(a,b):
    return a*b //gcd(a,b)
def getTotalX(a,b):
    min_gcd = reduce(gcd,b)
    max_lcm = reduce(lcm,a)
    count = 0
    for x in range(max_lcm,min_gcd+1,max_lcm):
        if min_gcd%x ==0:
            count += 1
    return count

#Day of the Programmer
def dayOfProgrammer(year):
    if year == 1918:
        return '26.09.{}'.format(year)
    elif year > 1918:
        if year%400==0:
            return '12.09.{}'.format(year)
        elif year%4==0:
            if year%100!=0:
                return '12.09.{}'.format(year)
            else:
                return '13.09.{}'.format(year)
        else:
            return '13.09.{}'.format(year)
    elif year < 1918:
        if year%4==0:
            return '12.09.{}'.format(year)
        else:
            return '13.09.{}'.format(year)

#Bon Appétit
def bonAppetit(bill, k, b):
    total_cost = 0
    #print(range(len(bill)))
    for i in range(len(bill)):
        #print(i)
        if i != k:
            total_cost += bill[i]
            #print(total_cost)
    cost_actual = int(total_cost/2)
    #print(cost_actual)
    if cost_actual == b:
        ans = print('Bon Appetit')
    else:
        ans = b - cost_actual
        print(ans)
    return ans

#Drawing Book
def pageCount(n, p):
    pageCanTurn = n//2
    needToTurn = p//2
    reversed_turn = pageCanTurn-needToTurn
    return min(needToTurn,reversed_turn)

#Electronics Shop
def getMoneySpent(keyboards, drives, b):
    costs = []
    for k in keyboards:
        for d in drives:
            if k + d <= b:
                costs.append(k+d)
    #print(costs)
    if costs == []:
        ans = '-1'
    else:
        ans = max(costs)

    return ans

#Cats and a Mouse
def catAndMouse(x, y, z):
    disA = abs(x-z)
    disB = abs(y-z)
    if disA == disB:
        output = 'Mouse C'
    elif disA > disB:
        output = 'Cat B'
    else:
        output = 'Cat A'
    return output

#Picking Numbers
def pickingNumbers(a):
        maximum = 0
        for i in a:
            c = a.count(i)
            d = a.count(i-1)
            c = c + d
        if c > maximum:
            maximum = c
    return maximum

#The Hurdle Race
def hurdleRace(k, height):
    if k > max(height):
        return 0
    else:
        drink = max(height) - k
        return drink

#Designer PDF Viewer
def designerPdfViewer(h, word):
    english = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z']
    dictionary = dict(zip(english, h))
    max_height = 0
    for i in word:
        height = dictionary[i]
        if height > max_height:
            max_height = height
    output = len(word) * max_height
    return output

#Utopian Tree
def utopianTree(n):
    H = 1
    i = 1
    while i <= n:
        if i%2 != 0:
            H = H * 2
            i += 1
        else:
            H = H + 1
            i += 1
    return H

#Angry Professor
def angryProfessor(k, a):
    on_time = 0
    for i in a:
        if i <=0:
            on_time += 1
        else:
            on_time = on_time
    if on_time >= k:
        return 'NO'
    else:
        return 'YES'

#Beautiful Days at the Movies
def beautifulDays(i, j, k):
    count = 0
    for day in range(i,j+1):
        reverse_day = int(str(day)[::-1])  #reverse:https://www.w3schools.com/python/python_howto_reverse_string.asp
        diff = abs(day - reverse_day)
        if diff%k ==0:
            count += 1
        else:
            count = count
    return count

#Viral Advertising
def viralAdvertising(n):
    cum = 0
    shared = 5
    for i in range(1,n+1):
        liked = math.floor(shared/2)
        cum += liked
        shared = liked * 3
    return cum

#Save the Prisoner!
def saveThePrisoner(n, m, s):
    r = m %n
    if (r+s-1)%n==0:
        return n
    else:
        return (r+s-1)%n

#Circular Array Rotation
def circularArrayRotation(a, k, queries):
    n = len(a)
    k = k%n
    new_arr = a[-k:]+a[:-k]
    return (new_arr[i] for i in queries)

#Sequence Equation
def permutationEquation(p):
    per = []
    for i in range(1,len(p)+1):
        py = p.index(i)+1
        ans = p.index(py) + 1
        per.append(ans)

    return per

#Jumping on the Clouds: Revisited
def jumpingOnClouds(c, k):
    energy = 100
    i = 0
    while (i != len(c)):
        if c[i] == 0:
            energy -= 1
        elif c[i] == 1:
            energy -= 3
        i += k
    return energy

#Find Digits
def findDigits(n):
    p = str(n)
    count = 0
    i = 0
    while i != len(p):
        if int(p[i]) == 0:
            pass  #not execute
        elif n%int(p[i]) == 0:
            count += 1
        else:
            count = count
        i +=1
    return count

#Sherlock and Squares
def squares(a, b):
    min_int = math.ceil(math.sqrt(a))
    max_int = math.floor(math.sqrt(b))
    count = max_int - min_int + 1
    return count

#Library Fine
def libraryFine(d1, m1, y1, d2, m2, y2):
    if y1<y2:
        fine = 0
    elif y1 == y2:
        if m1 < m2:
            fine = 0
        elif m1 == m2:
            if d1 <= d2:
                fine = 0
            else:
                fine = 15 * (d1-d2)
        elif m1 > m2:
            fine = 500 * (m1-m2)
    elif y1 > y2:
        fine = 10000
    return fine

def hourglassSum(arr):
    max_hourglass_sum = -63
    for i in range(1,5):
        for j in range(1,5):
            current_hourglass_sum = _get_hourglass_sum(arr,i,j)
            if current_hourglass_sum > max_hourglass_sum:
                max_hourglass_sum = current_hourglass_sum
    return max_hourglass_sum

#Append and Delete
def appendAndDelete(s, t, k):
    ind = 0
    for i in range(0,min([len(s),len(t)])):
        if s[i] != t[i]:
            break
        ind +=1
    delcount = len(s) - ind
    addcount = len(t) - ind
    totalcount = delcount + addcount
    if totalcount > k:
        return 'No'
    else:
        if (k-totalcount)%2!=0 and (len(s) +len(t))>k:  #eg: y yu 2
            return 'No'
        else:
        return 'Yes'

#Cut the sticks
import sys
n = int(input().strip())
arr = [int(arr_temp) for arr_temp in input().strip().split(' ')]

currSize = n

while currSize > 0:
    currMin = min(arr)
    print(len(arr))

    for i in range(len(arr)):
        arr[i] = arr[i] - currMin
        if arr[i] <= 0:
            arr[i]=0

    for i in range(arr.count(0)):
        arr.remove(0)

#Climbing the Leaderboard
def climbingLeaderboard(scores, alice):
    results = []
    leaderboard = sorted(set(scores), reverse = True)
    l = len(leaderboard)
    for a in alice:
        while (l > 0) and (a >= leaderboard[l-1]):
            l -= 1
        results.append(l+1)
    return results

#Equalize the Array
def equalizeArray(arr):
    max_cnt = max(arr,key = arr.count)
    length = 0
    for i in range(len(arr)):
        if arr[i] == max_cnt:
            length += 1

    ans = len(arr) - length
    return ans

#Minimum Distances
def minimumDistances(a):
    n = len(a)
    ans = []
    for i in range(n-1):
        for j in range(i+1,n):
            if a[i] == a[j]:
                distance = j - i
                ans.append(distance)
    if ans != []:
        return (min(ans))
    else:
        return -1

#Extra Long Factorials
def extraLongFactorials(n):
    i = 1
    product = 1
    while i <= n:
        product = product * i
        i = i + 1
    return product

import math
print(math.factorial(int(input())))

#Non-Divisible Subset
```
ans = []
for i in range(len(S)-1):
    for j in range(i+1,len(S)):
        #print(S[i],S[j])
        output = S[i] + S[j]
        ans.append(output)

#print(ans)
count = 0
for i in ans:
    if i % 3 != 0:
        count += 1
#print(count)
```
Correct Answer:
res = [0 for i in range (0, k)]
for i in S:
    res[i%k] += 1
#print(res)

maxN = 1 if res[0]>0 else 0
#print(maxN)

for i in range(1,k//2+1):
    if (i != k-i):
        maxN += max(res[i],res[k-i])
    else:
        maxN += 1

print(maxN)

#Service Lane
def serviceLane(n, cases):
    return [min(width[i:j+1]) for i,j in cases]

#Beautiful Triplets
def beautifulTriplets(d, arr):
    count = 0
    n = len(arr)
    for i in range(n):
        for j in range(i+1,n):
            if arr[j] - arr[i] == d:
                for k in range(j+1,n):
                    if arr[k] - arr[j] == d:
                        count += 1
                        break
                break

    return count

#Halloween Sale
def howManyGames(p, d, m, s):
    listA = []
    total = 0
    if p <= s:
        while total <= s:
            if p > m:
                listA.append(p)
                total += p
                if total > s:
                    del listA[-1]
                    break
                else:
                    if p > m:
                        p = p - d
                    else:
                        continue
            else:
                p = m
                total += p
                if total <=s:
                    listA.append(p)
                else:
                    break
        ans = len(listA)
    else:
        ans = 0
    return ans

#Super Reduced String
def superReducedString(s):
    ans = []
    for i in s:
        if len(ans) == 0:
            ans.append(i)
        elif ans[-1] == i:
            ans.pop()
        else:
            ans.append(i)
    if len(ans) == 0:
        return 'Empty String'
    else:
        return ''.join(ans)

#CamelCase
def camelcase(s):
    n = len(re.finall(r'[A-Z]',s)) + 1
    return n

#Taum and B'day
def taumBday(b, w, bc, wc, z):
    if wc > bc + z:
        new_cost = bc + z
        total_cost = b * bc + w * new_cost

    elif bc > wc + z:
        new_cost = wc + z
        total_cost = b * new_cost + w * wc
    else:
        total_cost = b * bc + w * wc
    return total_cost

#Chocolate Feast
def chocolateFeast(n, c, m):
    extras = 0
    totalEaten = base = n//c
    while base >= m:
        extras = base //m
        totalEaten += extras
        base = base%m + extras
    return totalEaten

#Lisa Workbook
n = 5
k = 3
arr = [4 ,2 ,6 ,1 ,10]
#arr = [3, 8, 15, 11, 14, 1, 9, 2, 24, 31]

def workbook(n, k, arr):
    page = 0
    count = 0
    t = []
    sum_num = []
    page_list = []
    for i in arr:
        l = []
        page_sub = 0
        while i > 0:
            if i <=k:
                l.append(i)
                page += 1
                page_sub +=1
                #print("l and page", l, page)
                t.append(l)
                page_list.append(page_sub)
                break
            else:
                page += 1
                page_sub +=1
                l.append(k)
                #print("l and page", l, page)
                i = i-k
    for j in t:
        num = sum(j)
        sum_num.append(num)
    print('sum_num',sum_num)
    print('page_num',page_list)
    print('total_page',page)

print(workbook(n, k, arr))

#Fair Rations
def fairRations(B):
    count = 0
    if sum(B)%2 != 0:
        return 'NO'
    else:
        for i in range(len(B)):
            if B[i]%2 != 0:
                B[i] = B[i] + 1
                B[i+1] = B[i+1] + 1
                count += 2
    return count

#cavityMap  **********************
def cavityMap(grid):
    for i in range(1,len(grid)-1):
        for j in range(1,len(grid)-1):
            left = grid[i][j-1]
            right = grid [i][j+1]
            top = grid [i-1][j]
            bottom = grid[i+1][j]
            x = int(grid[i][j])
            if left == 'X' or right == 'X' or top == 'X' or bottom == 'X':
                continue
            elif x > max(int(top),int(bottom),int(left),int(right)):
                map(grid[i][j]) = 'X'
    return grid

n = int(input().strip())
grid = []
#grid_i = 0
for grid_i in range(n):
    grid_t = list(str(input().strip()))
    grid.append(grid_t)

for i in range(1,(n-2)+1):
    for j in range(1,(n-2)+1):
        if grid[i][j]>max(grid[i-1][j],grid[i+1][j],grid[i][j-1],grid[i][j+1]):
            grid[i][j]='X'

for i in range(n):
    print (''.join(grid[i]))

#Modified Kaprekar Numbers
p = int(input())
q = int(input())

numOne = []
numTwo = []
sumList= []
ans = []
for i in range(p,q+1):
    number = str(i**2)
    num1= number[0:len(number) // 2].strip()
    num2 = number[len(number)//2:].strip()
    numOne.append(num1)
    numTwo.append(num2)
for i in range(len(numOne)):
    if numOne[i] == '':
        numOne[i] = numOne[i].replace('','0')
for i in range(len(numTwo)):
    if numTwo[i] == '':
        numTwo[i] = numTwo[i].replace('','0')
for k,l in zip(numOne,numTwo):
    sum_num = int(k) + int(l)
    sumList.append(sum_num)
for j,k in zip(range(p,q+1),sumList):
    if j == k:
        ans.append(j)
if ans == []:
    print('INVALID RANGE')
else:
    for i in ans:
        print(i,end=' ')
#time in words
def timeInWords(h, m):
    hours = ("one", "two", "three", "four", "five", "six",
                        "seven", "eight", "nine", "ten",
                        "eleven", "twelve")
    minutes = ("one", "two", "three", "four", "five", "six",
                        "seven", "eight", "nine", "ten",
                        "eleven", "twelve", "thirteen",
                        "fourteen","fifteen", "sixteen",
                        "seventeen", "eighteen", "ninteen",
                        "twenty", "twenty one", "twenty two",
                        "twenty three", "twenty four",
                        "twenty five", "twenty six",
                        "twenty seven", "twenty eight",
                        "twenty nine")

    formats = {
        0: "%s o' clock",
        1: "one minute past %s",
        10: "ten minutes past %s",
        15: "quarter past %s",
        30: "half past %s",
        40: "twenty minutes to %s",
        45: "quarter to %s",
    }

    time = ""

    if m in (0,1,10,15,30,40,45):
        k = 1 if m <= 30 else 0
        time = formats[m] % hours[h - k]

    elif (m < 30):
        hour = hours[h - 1]
        time = "{} minutes past {}".format(minutes[m - 1], hour)

    elif (m > 30):
        hour = hours[h]
        time = "{} minutes to {}".format(minutes[60 - m - 1], hour)

    return time

Data Structures
#Arrays - DS
def reverseArray(a):
    return reversed(a)

#2D Array - DS
def _get_hourglass_sum(matrix,row,col):
    sum = 0
    sum += matrix[row-1][col-1]
    sum += matrix[row-1][col]
    sum += matrix[row-1][col+1]
    sum += matrix[row][col]
    sum += matrix[row+1][col-1]
    sum += matrix[row+1][col]
    sum += matrix[row+1][col+1]
    return sum
