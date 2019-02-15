<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/15
 * Time: 16:24
 */


/**
 * 数组实现队列
 * Class Queue
 */
class Queue
{
    private $queue;

    public function __construct()
    {
        $this->queue = [];
    }

    public function isEmpty()
    {
        return empty($this->queue);
    }

    public function push($value)
    {
        array_push($this->queue,$value);
    }

    public function pop()
    {
        if (!$this->isEmpty()){
            array_pop($this->queue);
        }
    }
    public function un_shift($value){
        array_unshift($this->queue,$value);
    }
    public function shift(){
        if (!$this->isEmpty()){
            array_shift($this->queue);
        }
    }

    public function front()
    {
        return reset($this->queue);
    }

    public function end()
    {
        return end($this->end());
    }

    public function destroy()
    {
        unset($this->queue);
    }


}