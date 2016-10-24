<?php
class people
{
    private $say;

    public function __construct($word,say $say,all $all)
    {
        $this->say = $say;
    }
}



class say{}

interface all{}


try{

    $class = 'people';

    $reflect = new ReflectionClass($class);
    $construct = $reflect->getConstructor();

    if(!$construct){
        new $class;
    }else if($parameters = $construct->getParameters()){
        foreach ($parameters as $parameter){

            //php7可以使用 getType();
            if ($obj = $parameter->getClass()){

                if((new ReflectionClass($obj->name))->isInterface()){
                    //取出依赖，如果没有则报错
                    echo $obj->name . 'is a interface' . PHP_EOL;
                } else {
                    echo $obj->name.' is a class' . PHP_EOL;
                }

            }else{
                echo $parameter->getName().' is not class' . PHP_EOL;
            }
        }
    }

}catch (\Exception $e){
    throw new \Exception('error by:'.$e->getMessage());
}
/*
 * word is not class
 * say is a class
 */
