<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/14
 * Time: 15:54
 */

/**
 * 节点
 * Class Node
 */
class Node
{
    public $key, $value, $left, $right;

    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
        $this->left = $this->right = NULL;
    }
}

class BST
{
    private $count, $root;

    public function __construct()
    {
        $this->root = NULL;
        $this->count = 0;
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        $this->destroy($this->root);
    }

    public function size()
    {
        return $this->count;
    }

    public function isEmpty()
    {
        return $this->count == 0;
    }

    public function insert($key, $value)
    {
        $this->__insert($this->root,$key,$value);
    }

    public function contain($key)
    {
        return $this->__contain($this->root,$key);
    }

    public function search($key)
    {
        return $this->__search($this->root,$key);
    }

    public function preOrder()
    {
        $this->__preOrder($this->root);
    }

    public function inOrder()
    {
        $this->__inOrder($this->root);
    }

    public function afterOrder()
    {
        $this->__afterOrder($this->root);
    }

    /**
     * 层序遍历
     */
    public function levelOrder()
    {
        $queue = new Queue();

        $queue->push($this->root);

        while (!$queue->isEmpty()){

            $node = $queue->front();

            $queue->pop();

            echo $node->key.'<br/>';

            if ($node->left){
                $queue->push($node->left);
            }
            if ($node->right){
                $queue->push($node->right);
            }
        }
    }

    /**
     * 删除节点
     * @param $node
     */
    private function destroy(&$node)
    {
        if($node !== NULL)
        {
            $this->destroy($node->left);
            $this->destroy($node->right);
            unset($node);
            $this->count --;
        }
    }

    //对NODE为根的二叉树进行后序遍历
    private function __afterOrder( &$node)
    {
        if ($node != NULL){
            $this->__inOrder($node->left);
            $this->__inOrder($node->right);
            echo $node->key.'<br/>';
        }
    }

    //对NODE为根的二叉树进行中序遍历
    private function __inOrder(&$node)
    {
        if ($node != NULL){
            $this->__inOrder($node->left);
            echo $node->key.'<br/>';
            $this->__inOrder($node->right);
        }
    }

    //对Node为根的二叉搜索树进行前序遍历
    private function __preOrder(&$node)
    {
        if ($node != NULL){
            echo $node->key.'<br/>';
            $this->__preOrder($node->left);
            $this->__preOrder($node->right);
        }
    }

    //在以node为根的二叉搜索树中查找key所对应的value
    private function __search(&$node,$key)
    {
        if ($node == NULL)
            return NULL;
        if ($key == $node->key)
            return $node->value;
        else if ($key < $node->key)
            return $this->__search($node->left,$key);
        else
            return $this->__search($node->right,$key);
    }

    //在以node为根的二叉搜索树中查找key是否存在
    private function __contain(&$node,$key)
    {
        if ($node == NULL)
            return false;
        if ($key == $node->key)
            return true;
        else if ($key < $node->key)
            return $this->__contain($node->left,$key);
        else
            return $this->__contain($node->right,$key);
    }

    //向以node为根的二叉搜索树中,插入节点(key,value)
    //返回插入新节点后的二叉搜索树的根
    private function __insert(&$node,$key,$value)
    {
        if ($node == NULL){
            $this->count++;
            $node = new Node($key,$value);
        }
        if ($key == $node->key)
            $node->value = $value;
        else if ($key < $node->key)
            $this->__insert($node->left,$key,$value);
        else
            $this->__insert($node->right,$key,$value);
    }

}
