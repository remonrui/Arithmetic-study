<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/13
 * Time: 10:46
 * 堆排序，也属于一种选择排序
 */

//$arr = [49, 38, 65, 97, 76, 13, 27, 50];
//sortHeap($arr);
//print_r($arr);

function heapSort(&$arr)
{
    //先建堆
    buildHeap($arr);

    //把第一个节点和最后一个节点交换,直到节点数为1
    $count = count($arr);
    while ($count > 1) {
        swap($arr[$count - 1], $arr[0]); //交换第一个和最后一个元素
        $count--; //去掉最后一个元素后剩余元素再进行调整
        adjustHeap($arr, $count, 0);
    }
}

function buildHeap(&$arr)
{
    $node = floor(count($arr) / 2) - 1; //非叶子节点的最大节点,下标从0开始
    for ($i = $node; $i >= 0; $i--) { //从最大非叶子节点循环调整每个节点
        adjustHeap($arr, count($arr), $i);
    }
}

//调整堆,接受maxLen为当前堆需要调整的元素最大值，node为当前要调整的节点
function adjustHeap(&$arr, $maxLen, $node)
{
    $lchild = 2 * $node + 1; //左子树
    $rchild = 2 * $node + 2; //右子树

    $max = $node; //设置当前节点为最大值的节点,方便后边最大值节点变化时与当前节点比较,确认是否需要交换

    while ($lchild < $maxLen || $rchild < $maxLen) { //左子树和右子树任一个符合条件就进入循环

        if ($lchild < $maxLen && $arr[$lchild] > $arr[$max]) { //左子树大于当前节点值得话设置设置$max
            $max = $lchild;
        }

        if ($rchild < $maxLen && $arr[$rchild] > $arr[$max]) {
            $max = $rchild;
        }

        if ($max != $node) {
            swap($arr[$max], $arr[$node]);
            $node   = $max; //把当前节点切换为最大值的那个节点,迭代使其符合堆特性
            $lchild = 2 * $node + 1;
            $rchild = 2 * $node + 2;
        } else {
            break; //没有发生交换就退出
        }
    }
}
