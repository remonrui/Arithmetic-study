<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/29
 * Time: 11:14
 * 算法助手函数
 */

/**变量交换
 * @param $n
 * @param $m
 */
function swap(&$n, &$m){
    $flag = $n;
    $n = $m;
    $m  = $flag;
}

/**打印数组
 * @param $arr
 */
function dump($arr)
{
    echo '<pre>';
    var_dump($arr);
    echo '</pre>';
}

function dump_key($name,$key)
{
    echo ($name."的值是:".$key."\n");
}

/**毫秒时间
 * @return float
 */
function msectime() {
    list($msec, $sec) = explode(' ', microtime());
    $msectime = (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
    return $msectime;
}


/**
 * 随机数组
 * @param $n @个数
 * @param $l @左边界
 * @param $r @右边界
 * @return array|bool
 */
function generateRandomArray($n, $l, $r)
{
    if ($l >= $r) return false;

    $arr = [];

    for ($i = 0 ;$i < $n; $i++){
        $arr[$i] = mt_rand($l,$r);
    }

    return $arr;
}

/**
 * @param $arr
 * @param $param
 */
function TestSortTime($arr,$param){

    $new_arr = $param;
    $startTime = msectime();
    $arr($new_arr);
    $endTime = msectime();
    $time = $endTime-$startTime;
   echo ("算法".$arr."耗时--".$time."毫秒"."\n");
}