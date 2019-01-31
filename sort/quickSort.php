<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/30
 * Time: 15:56
 * 快速排序
 * 快速排序最差的情况，完全有序，复杂度为n方
 */

/**
 * 随机快排
 * @param $arr
 */
function quickSort(&$arr)
{
    $n = count($arr);

    _quickSort($arr, 0, $n-1);

}

/***
 * 优化算法，针对有大量重复数据的优化
 * @param $arr
 */
function quickSort1(&$arr)
{
    $n = count($arr);

    _quickSort1($arr, 0, $n-1);

}

/**
 * 三路排序
 * @param $arr
 */
function quickSort2(&$arr)
{
    $n = count($arr);

    _partition2($arr, 0, $n-1);

}
/**
 * 递归
 * @param $arr
 * @param $l
 * @param $r
 */
function _quickSort(&$arr, $l, $r)
{
    if ($l >= $r) return;

    $p = _partition($arr, $l, $r);

    _quickSort($arr,$l, $p-1);

    _quickSort($arr,$p+1, $r);

}

function _quickSort1(&$arr, $l, $r)
{
    if ($l >= $r) return;

    $p = _partition1($arr, $l, $r);

    _quickSort1($arr,$l, $p-1);

    _quickSort1($arr,$p+1, $r);

}



/**子函数
 * @param $arr
 * @param $l
 * @param $r
 * @return mixed
 */
function _partition(&$arr, $l, $r)
{
    //优化、随机取$arr[l,r]的值为比较值，降低期望值

    swap($arr[$l],$arr[mt_rand($l,$r)]); //可注释此行代码，比较优化前后的执行效率

    //选取最左边的值做比较值
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

/**
 * 双路排序
 * @param $arr
 * @param $l
 * @param $r
 * @return mixed
 */
function _partition1(&$arr, $l, $r)
{
    //优化、随机取$arr[l,r]的值为比较值，降低期望值

    swap($arr[$l],$arr[mt_rand($l,$r)]); //可注释此行代码，比较优化前后的执行效率

    //选取最左边的值做比较值
    $v = $arr[$l];


    $i = $l+1; $j = $l;

    while (true){

        while ($i <= $r && $arr[$i] < $v) $i++;

        while ($j >= $l+1 && $arr[$j] > $v) $j--;

        if ($i > $j) break;

        swap($arr[$i],$arr[$j]);

        $i++; $j--;
    }

    swap($arr[$l],$arr[$j]);

    return $j;

}

/**
 * 三路排序
 * 将arr分为 <v; ==v; >v 三部分
 * 再递归对>v 和 <V两部分进行三路排序
 * @param $arr
 * @param $l
 * @param $r
 */
function _partition2(&$arr, $l, $r)
{
    if ($l >= $r) return;

    //优化、随机取$arr[l,r]的值为比较值，降低期望值

//    dump_key('随机l',$l);
//    dump_key('随机r',$r);

    swap($arr[$l],$arr[mt_rand($l,$r)]); //可注释此行代码，比较优化前后的执行效率

    //选取最左边的值做比较值
    $v = $arr[$l];

    $lt = $l; //$arr[l+1,lt] < v
    $gt = $r+1; //$arr[gt,r] > v
    $i = $l+1; //$arr[lt+1,i] == v

    while ($i < $gt){
        if ($arr[$i] < $v){
            swap($arr[$i],$arr[$lt+1]);
            $lt++;
            $i++;
        }elseif ($arr[$i] > $v){
            swap($arr[$i],$arr[$gt-1]);
            $gt--;
        }else{
            $i++;
        }
    }
    swap($arr[$l],$arr[$lt]);

//    dump_key('$l',$l);
//
//    dump_key('$lt',$lt);
//
//    dump_key('$gt',$gt);

    _partition2($arr,$l,$lt-1);

    _partition2($arr,$gt,$r);

}

