<?php
/**
 * Created by PhpStorm.
 * User: cxx
 * Date: 2018/1/21
 * Time: 16:03
 */

class person{

    public $name;
    public $gender;

    public function say(){

        echo $this->name,"\tis",$this->gender,"\t\n";

    }


    public function __set($name, $value)
    {

        // TODO: Implement __set() method.
        echo "setting $name to $value",PHP_EOL;
        $this->$name = $value;
    }


    public function __get($name)
    {
        // TODO: Implement __get() method.
        if(!isset($this->$name)){
            echo "no";
            $this->$name = 'moren';
        }
        return $this->$name;
    }


}


/*$student = new person();
$student->name = 'tom';
$student->gender = 'male';
$student->age = 24;*/


/*$reflect = new ReflectionObject($student);
$props = $reflect->getProperties();


foreach ($props as $prop){
    print $prop->getName().PHP_EOL;
}

$m = $reflect->getMethods();

foreach ($m as $prop){
    print $prop->getName().PHP_EOL;
}*/


/*
var_dump(get_object_vars($student));
var_dump(get_class_vars(get_class($student)));
var_dump(get_class_methods(get_class($student)));*/

$obj = new ReflectionClass('person');
$className = $obj->getName();
$methods = $Properties = array();

foreach ($obj->getProperties() as $v){
    $Properties[$v->getName()] = $v;
}
foreach ($obj->getMethods() as $v){
    $methods[$v->getName()] = $v;
}
echo "class{$className}".PHP_EOL;

is_array($Properties)&&ksort($Properties);

foreach ($Properties as $k => $v){
    echo "\t";
    echo $v->isPublic()?'public':'',$v->isPrivate()?'provate':''.$v->isStatic()?'static':'';
    echo PHP_EOL."{$k}".PHP_EOL;
}
echo PHP_EOL;
if(is_array($methods)) ksort($methods);

foreach ($methods as $k => $v){
    echo "function {$k}(){}".PHP_EOL;
}
