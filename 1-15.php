<?php
/**
 * Created by PhpStorm.
 * User: cxx
 * Date: 2018/1/24
 * Time: 22:48
 */
class mysql{
    function connect($db){
        echo "连接到数据库${db[0]}\r\n";
    }
}

class sqlproxy{
    private $target;
    function __construct($tar)
    {
        $this->target[] = new $tar();
    }

    function __call($name, $args)
    {
        // TODO: Implement __call() method.
        foreach ($this->target as $obj){
            $r = new ReflectionClass($obj);
            if($method = $r->getMethod($name)){
                if($method->isPublic() && !$method->isAbstract()){
                    echo "方法前拦截记录 LOG",PHP_EOL;
                    $method->invoke($obj,$args);
                    echo "方法后拦截",PHP_EOL;
                }
            }
        }
    }
}
$obj = new sqlproxy('mysql');

$obj->connect('member');