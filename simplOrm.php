<?php
/**
 * Created by PhpStorm.
 * User: cxx
 * Date: 2017/11/5
 * Time: 22:44
 * 简单的ORM模型
 */



abstract class ActiveRecord{
    protected static $table;
    protected $fieldvalues;
    public $select;

    static function findById($id){
        $query = "select * from ".static::$table." where id = ".$id;
        return self::createDomain($query);
    }

    function __get($fieldname){
        return $this->fieldvalues[$fieldname];
    }

    static function __callStatic($method, $args)
    {
        $field = preg_replace('/^findBy(\w*)$/','$1',$method);
        $query = "select * from ".static::$table." where ".$field." = '$args[0]'";

        return self::createDomain($query);
    }

    private static function createDomain($query){
        $klass = get_called_class();
        $domain = new $klass();
        $domain->fieldvalues = array();
        $domain->select = $query;
        foreach ($klass::$fields as $field => $type){
            $domain->fieldvalues[$field] = 'TODO:set from sql result';
        }
        return $domain;
    }
}




class Customer extends ActiveRecord{
    protected static $table = 'custdb';
    protected static $fields = array(
        'id' => 'int',
        'email' => 'varchar',
        'lastname' => 'varchar'
    );

}
class Sales extends ActiveRecord{
    protected static $table = 'salesdb';
    protected static $fields = array(
        'id' => 'int',
        'item' => 'varchar',
        'qty' => 'int'
    );
}
echo 123;
$a = Customer::findById(123)->select;
assert (1 ==2);
assert ("select * from custdb where id = 123" == Customer::findById(123)->select);