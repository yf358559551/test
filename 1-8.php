<?php
/**
 * Created by PhpStorm.
 * User: cxx
 * Date: 2018/1/12
 * Time: 22:56
 */
//interface employee{
//    public function working();
//}
//
//class teacher implements employee{
//    public function working()
//    {
//        echo '教书';
//    }
//}
//
//class coder implements employee{
//    public function working()
//    {
//        echo '敲代码';
//    }
//}
//
//function doprint(employee $i){
//    $i->working();
//}
//
//$a = new teacher();
//$b = new coder();
//doprint($a);
//doprint($b);



/**
教师类有一个drawPolygon()方法需要一个Polygon类，用来画多边形，此方法内部调用多边形的draw()方法，但由于弱类型，我们可以传入Circle类，就会调用Circle类的draw方法，这就事与愿违了。甚至可以传入阿猫、阿狗类，如果这些类没有draw()方法还会报错。
 */
class Teacher{
    function drawPolygon($polygon){
        $polygon->draw();
    }
}

class Polygon{
    function draw(){
        echo "draw a polygon";
    }
}

class Circle{
    function draw(){
        echo "draw a circle";
    }
}

function drawPolygon(Polygon $polygon){
    $polygon->draw();
}