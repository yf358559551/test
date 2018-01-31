<?php
abstract class Father {
    function meth1() {
        echo "meth1...<br>";
    }
    abstract function meth2();
    public $var1="var1";
    public static $var2="var2";
    const Var3="Var3";
}
class Son extends Father {
    function meth2() {
        echo "meth2 of Son...<br>";
    }
}
$s=new Son();
echo $s->var1."<br>";
echo Father::$var2."<br>";
echo Father::Var3."<br>";


Interface IFather {
    //public $iVar1="iVar1";        此处接口定义中不能包含成员变量
    //public static $iVar2="iVar2"; 此处接口定义中不能包含静态变量
    const iVar3="iVar3";
    function iMeth1();
}
Class ISon implements IFather {
    function iMeth1() {
        echo "iMeth1...<br>";
    }
}
$is=new ISon();
echo IFather::iVar3;
?>  