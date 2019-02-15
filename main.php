<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/30
 * Time: 10:32
 * 主函数
 */

define('MainPath',__DIR__);
require_once (MainPath.'/base');
require_once (MainPath.'/sort/insertSort.php');
require_once (MainPath.'/sort/mergeSort.php');
require_once (MainPath.'/sort/quickSort.php');
require_once (MainPath.'/sort/selectionSort.php');
require_once (MainPath.'/sort/heapSort.php');


function main()
{
    $arr = generateRandomArray(10000,1,1000);

//    dump($arr);
    TestSortTime("sort",$arr);
    TestSortTime("selectionSort",$arr);
    TestSortTime("insertSort1",$arr);
    TestSortTime("insertSort2",$arr);
    TestSortTime("mergeSort",$arr);
    TestSortTime("mergeSortBu",$arr);
    TestSortTime("quickSort",$arr);
    TestSortTime("quickSort1",$arr);
    TestSortTime("quickSort2",$arr);
    TestSortTime("heapSort",$arr);

//    quickSort2($arr);


//
//    quickSort($arr);
//
    heapSort($arr);

}

main();