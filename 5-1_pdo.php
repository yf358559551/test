<?php
/**
 * Created by PhpStorm.
 * User: cxx
 * Date: 2018/1/30
 * Time: 21:37
 */

try{
    $dsn = "mysql:host = localhost;dbname = python";//配置PDO的数据源
    $db = new PDO($dsn,'root','123456'); //构造方法

    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'UTF8'");

    $sql = "INSERT INTO test (name,remark,ip,addTime) VALUES ('abc','kkk','{$_SERVER['SSH_CLIENT']}',".time().")";

    $db ->exec($sql);

    //使用预处理语句
    $insert = $db->prepare("INSERT INTO test (name,remark,ip,time) VALUES ('?','?','?','".time()."')");
    $insert->execute(array('admin','备注1111',"{$_SERVER['SSH_CLIENT']}"));
    $insert->execute(array('admin','备注22222',"{$_SERVER['SSH_CLIENT']}",8,9));
    //异常

    $sql = "select * from test";
    $query = $db->prepare($sql);
    $query->execute();
    var_dump($query->fetchAll(PDO::FETCH_ASSOC));

}catch (PDOException $err){
    echo $err->getMessage();
}