<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/30
 * Time: 9:47
 * 归并排序
 */


/**
 * 主函数 自上而下
 * @param $arr
 */
function mergeSort(&$arr)
{
    $n = count($arr);

    _mergeSort($arr, 0, $n-1);
}

/**自下而上的归并排序
 * @param $arr
 */
function mergeSortBu(&$arr)
{
    $n = count($arr);
    for ($sz = 1; $sz <= $n; $sz += $sz){
        for ($i = 0; $i + $sz < $n; $i += $sz + $sz){
            _merge($arr,$i,$i+$sz-1,min($i+$sz+$sz,$n-1));
        }
    }
}
/**
 * 递归函数
 * @param $arr
 * @param $l
 * @param $r
 */
function _mergeSort(&$arr, $l, $r)
{
    if ($l >= $r) return;

//    if($r -$l <=15){
//        insertSort2($arr);
//        return;
//    }

    $mid = floor(($l + $r) /2);

    _mergeSort($arr, $l ,$mid);

    _mergeSort($arr, $mid+1, $r);

    //对大于中间值的才比较，因为小于等于中间值的已经有序了
    if($arr[$mid] > $arr[$mid+1])
        _merge($arr, $l, $mid, $r);
}

/**
 * 子函数
 * @param $arr
 * @param $l
 * @param $mid
 * @param $r
 */
function _merge(&$arr, $l, $mid, $r)
{
    $aux = [];

    for ($i = $l; $i<=$r; $i++ ){
        $aux[$i-$l] = $arr[$i];
    }


    $i = $l; $j = $mid+1;

    for ($k = $l; $k <= $r; $k++){
        if ($i >$mid){
            $arr[$k] = $aux[$j-$l];
            $j++;
        }elseif ($j > $r){
            $arr[$k] = $aux[$i-$l];
            $i++;
        }elseif ($aux[$i-$l] < $aux[$j-$l]){
            $arr[$k] = $aux[$i-$l];
            $i++;
        }else{
            $arr[$k] = $aux[$j-$l];
            $j++;
        }
    }
}
