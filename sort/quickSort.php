<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/30
 * Time: 15:56
 * 快速排序
 */


function quickSort(&$arr)
{
    $n = count($arr);

    _quickSort($arr, 0, $n-1);

}

function _quickSort(&$arr, $l, $r)
{
    if ($l >= $r) return;

    $p = _partition($arr, $l, $r);

    _quickSort($arr,$l, $p-1);

    _quickSort($arr,$p+1, $r);

}

function _partition(&$arr, $l, $r)
{
    $v = $arr[$l];
    $j = $l;

    for ($i = $l + 1; $i <= $r; $i++){
        if ($arr[$i] < $v){
            swap($arr[$j+1], $arr[$i]);
            $j++;
        }
    }
    swap($arr[$l],$arr[$j]);

    return $j;
}