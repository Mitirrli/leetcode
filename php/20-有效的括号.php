<?php

class Solution {
    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {
        //后进先出: 遍历整个字符串s 如果是左括号将其压入栈中 右括号将栈中元素取出对比
        $validChar = ['(', '{', '['];
        $matchDictionary = [']' => '[', '}' => '{', ')' => '('];
            
        //创建一个数组当作栈 array_push作为压栈操作 array_pop作为出栈操作
        $stack = [];

        //字符串长度
        $length = strlen($s);

        //遍历字符串
        for ($i = 0; $i < $length; $i++)
        {
            if(in_array($s[$i], $validChar)) {
                //左括号压入栈中
                array_push($stack, $s[$i]);
            } else {
                //右括号匹配
                if($matchDictionary[$s[$i]] !== array_pop($stack)) {
                    return false;
                }
            }
        }

        //到最后数组应该全部匹配完
        return empty($stack) ? true : false;
    }
}
