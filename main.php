<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/30
 * Time: 10:32
 * 主函数
 */

define('MainPath',__DIR__);
require_once (MainPath.'/helper/helper.php');
require_once (MainPath.'/sort/insertSort.php');
require_once (MainPath.'/sort/mergeSort.php');
require_once (MainPath.'/sort/quickSort.php');
require_once (MainPath.'/sort/selectionSort.php');


function main()
{
    $arr = generateRandomArray(10000,100,110);

//    dump($arr);
    TestSortTime("sort",$arr);
    TestSortTime("selectionSort",$arr);
    TestSortTime("insertSort1",$arr);
    TestSortTime("insertSort2",$arr);
    TestSortTime("mergeSort",$arr);
    TestSortTime("mergeSortBu",$arr);
    TestSortTime("quickSort",$arr);


//
//    quickSort($arr);
//
//    dump($arr);

}

main();