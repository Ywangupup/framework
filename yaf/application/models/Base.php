<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/17 0017
 * Time: 下午 7:10
 */
class BaseModel{
    protected $db;
    //创建类对象即链接数据库
    public function __construct()
    {
        $this->db=new PDO("mysql:dbname=framework",'root','root');
    }
    //创建方法 支持读操作.
    public function get($sql){
        $pdostatement=$this->db->query($sql);
        return $pdostatement->fetchAll(PDO::FETCH_ASSOC);
    }
    //创建方法,支持写操作
    public function add($sql){
        return $this->db->exec($sql);
    }
}