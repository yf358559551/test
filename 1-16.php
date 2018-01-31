<?php
/**
 * Created by PhpStorm.
 * User: cxx
 * Date: 2018/1/28
 * Time: 14:46
 */
$a = null;
try{
    $a = 5/0;
    echo $a.PHP_EOL;
}catch (exception $e){
    $e->getMessage();
    $a = -1;
}
echo $a;