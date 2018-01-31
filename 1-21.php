<?php
/**
 * Created by PhpStorm.
 * User: cxx
 * Date: 2018/1/28
 * Time: 22:21
 */

//function customError($errno,$errstr,$errfile,$errline,$level){
//
///*    echo "错误代码:[$errno]$errstr",PHP_EOL;
//    echo "错误所在的行数:{$errline} 文件{$errfile}",PHP_EOL;
//    echo "PHP版本:",PHP_VERSION,"(",PHP_OS,")",PHP_EOL;*/
//    //die();
//    throw new Exception($errline.'|'.$errstr);
//}
//set_error_handler("customError",E_ALL|E_STRICT);
//$a = array('o'=>2,4,6,8);
//echo $a[o];
//try{
//    $a = 5/0;
//}catch(Exception $e){
//    echo "错误信息:".$e->getMessage();
//}

class Shutdown{
    public function stop(){
        if(error_get_last()){
            print_r(error_get_last());
        }
        die('Stop.');
    }
}
register_shutdown_function(array(new Shutdown(),'stop'));
$a = new a();
echo '必须终止';