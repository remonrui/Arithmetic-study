<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/31
 * Time: 9:38
 */

/**插入排序方法1
 * @param $arr
 */
function insertSort1(&$arr){

    $l = count($arr);

    for ($i = 1; $i < $l; $i++){

        //寻找arr[i]合适的插入位置
        for ($j = $i; $j > 0 && $arr[$j] < $arr[$j-1]; $j--){
            swap($arr[$j],$arr[$j-1]);
        }
    }
}

/**
 * 优化的插入排序2
 * @param $arr
 */
function insertSort2(&$arr){

    $l = count($arr);
    for ($i = 1; $i < $l; $i++){

        $tmp = $arr[$i];
        //寻找arr[i]合适的插入位置
        for ($j = $i; $j > 0 && $arr[$j-1] > $tmp; $j--){
            $arr[$j] = $arr[$j-1];
        }
        $arr[$j] = $tmp;
    }
}
