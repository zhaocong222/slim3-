<?php
class HelloWorld
{

    public function sayHelloTo($name,$sport)
    {
        return 'Hello ' . $name . 'xxxx' . $sport . PHP_EOL;
    }

}
$reflect = new ReflectionMethod('HelloWorld','sayHelloTo');
//echo $reflect->invoke(new HelloWorld(),'lucy','skiing');
//echo $reflect->invokeArgs(new HelloWorld(),['tom','football']);

//静态方法
class myClass
{
    public static function myStaticFunc($a, $b)
    {
        return $a + $b;
    }
}

$ref = new ReflectionMethod('myClass', 'myStaticFunc');
//静态方法第一个参数直接传null即可
echo $ref->invokeArgs(NULL, [12, 7]);
