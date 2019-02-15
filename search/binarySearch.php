<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/14
 * Time: 15:01
 */

/**
 * 二分查找法
 * @param $arr
 * @param $search
 * @return float|int
 */
function binary_search($arr,$search){
    //定义最低和最高下标
    $low = 1;
    $high = count($arr)+1;
    while ($low <= $high){
        $mid = ($low + $high)/2;
        if ($search < $arr[$mid]){
            $high = $mid-1;
        }elseif ($search > $arr[$mid]){
            $low = $mid+1;
        }else{
            return $mid;
        }
    }
    return -1;
}
