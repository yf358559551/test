<?php
/**
 * Created by PhpStorm.
 * User: cxx
 * Date: 2018/1/15
 * Time: 22:48
 */

interface mobile{
    public function run();
}

class plain implements mobile{
    public function run()
    {
        echo '我是飞机';// TODO: Implement run() method.
    }

    public function fly(){
        echo '飞行';
    }
}

class car implements mobile{
    public function run()
    {
       echo '我是汽车';// TODO: Implement run() method.
    }
}
class machine{
    function demo(mobile $a){
        $a->fly();
    }
}

$obj = new machine();

$obj->demo(new plain());
$obj->demo(new car());