<?php
/**
 * Created by PhpStorm.
 * User: cxx
 * Date: 2018/2/5
 * Time: 22:37
 */

function bindParam(& $sql,$location,$var,$type){

    //确定类型
    switch ($type){
        //字符串
        default:    //默认使用字符串类型

        case 'STRING' :
            $var = addslashes($var); //转义
            $var = "'".$var."'";     //加上单引号
            break;

        case 'INTEGER':

        case 'INT':
            $var = (int)$var;//强转int
    }

    for ($i = 1,$pos =0 ;$i <= $location ;$i++){
        $pos = strpos($sql,'?',$pos+1);
    }

    //替换？
    $sql = substr($sql,0,$pos).$var.substr($sql,$pos+1);
}


$uid = 10086;
$pwd = "pwd";
$sql = " SELECT * FROM table WHERE uid = ? AND pwd = ?";
bindParam($sql,1,$uid,'INT'); //第一个参数绑定的参数为uid 为int 型
bindParam($sql,2,$pwd,'STRING');

echo $sql;