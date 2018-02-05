<?php
/**
 * Created by PhpStorm.
 * User: cxx
 * Date: 2018/2/3
 * Time: 23:16
 */

//pdo参数绑定示例

$calories = 150;
$colour = 'red';

$dsn = "mysql:dbname=python;host=127.0.0.1";//配置PDO的数据源
$dbh = new PDO($dsn,'root','123456'); //构造方法

$sth = $dbh->prepare('SELECT name,colour,calories FROM fruit WHERE calories < :calories AND colour = :colour');
$sth->bindParam(':calories',$calories,PDO::PARAM_INT);
$sth->bindParam(':colour',$colour,PDO::PARAM_STR,12);

$sth->execute();
//
//var_dump($sth);

$sth = $dbh->prepare('SELECT name,colour,calories FROM fruit WHERE calories < ? AND colour = ? ');
$sth->bindParam(1,$calories,PDO::PARAM_INT);
$sth->bindParam(2,$colour,PDO::PARAM_STR,12);
$a = $sth->execute();

