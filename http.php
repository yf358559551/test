
<?php
/**
 * Created by PhpStorm.
 * User: cxx
 * Date: 2018/1/10
 * Time: 21:41
 */
//$html = file_get_contents("http://www.baidu.com/");
//print_r($http_response_header);
//$fp = fopen('http://www.baidu.com/','r');
//print_r(stream_get_meta_data($fp));
//fclose($fp);


define('SECRET',"67%$#ap28");
function m_token(){
    $str = mt_rand(1000,9999);
    $str2 = dechex($_SERVER['REQUEST_TIME']-$str);
    return $str.substr(md5($str.SECRET),0,10).$str2;

}
echo m_token();
echo '<br/>';
function v_token($str,$delay = 300){

    $rs = substr($str,0,4);
    $middle = substr($str,0,14);
    $rs2 = substr($str,14,8);

    return ($middle == $rs.substr(md5($rs.SECRET),0,10))&&($_SERVER['REQUEST_TIME']-hexdec($rs2)-$rs<$delay);

}
var_dump(v_token(m_token()))

?>