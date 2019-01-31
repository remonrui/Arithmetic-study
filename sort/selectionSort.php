<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/29
 * Time: 11:28
 * O(n方)排序算法
 */


/**选择排序
 * @param $arr
 */
function selectionSort(&$arr){

    $l = count($arr);

    for($i = 0; $i < $l -1; $i++){

        //寻找[i,n]区间的最小值
        //标记最小值的索引
        $minIndex = $i;
        for($j = $i+1; $j <$l ; $j++){
            if ($arr[$j] < $arr[$minIndex]){
                $minIndex = $j;
            }
        }
        //交换位置
        if($i != $minIndex){
            swap($arr[$i],$arr[$minIndex]);
        }
    }
}

