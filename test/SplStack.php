<?php
//SplStack就是继承双链表(SplDoublyLinkedList)实现栈。

/**
 * 可见栈和双链表的区别就是IteratorMode改变了而已，栈的IteratorMode只能为：
 * （1）SplDoublyLinkedList::IT_MODE_LIFO | SplDoublyLinkedList::IT_MODE_KEEP （默认值,迭代后数据保存）
 * （2）SplDoublyLinkedList::IT_MODE_LIFO | SplDoublyLinkedList::IT_MODE_DELETE （迭代后数据删除）
 */

//$stack = new SplStack(SplDoublyLinkedList::IT_MODE_FIFO | SplDoublyLinkedList::IT_MODE_DELETE);
$stack = new SplStack(SplDoublyLinkedList::IT_MODE_LIFO | SplDoublyLinkedList::IT_MODE_KEEP);
//入栈
//$stack->push('a');
//$stack->push('b');
//$stack->push('c');

// 用数组方式或者push都可以
$stack[] = 'a';
$stack[] = 'b';
$stack[] = 'c';
$stack->push('d');

echo $stack->top() , PHP_EOL; //取出栈的最上面元素 c
exit();

//echo $stack->pop(),PHP_EOL; //出栈 c
//exit();

//出栈
/*
$stack->offsetSet(0, 'first'); //栈中最上面的元素值设为first

foreach ($stack as $item){
    echo $item . PHP_EOL;
}
*/

//print_r($stack);


//重置迭代指针 
$stack->rewind();
while( $stack->valid() )
{
    echo $stack->current(), PHP_EOL;
    $stack->next();
}
print_r($stack);

