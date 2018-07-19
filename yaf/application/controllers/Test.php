<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/17 0017
 * Time: 下午 6:40
 */
class TestController extends Yaf_Controller_Abstract{
    public function indexAction() {
        $t2Model=new T2Model();
        $t2s=$t2Model->get("select * from t2");
        foreach ($t2s as $t2):
        print_r($t2);
        echo "<br>";
        endforeach;
        $rs=$t2Model->add("insert into t2 VALUES(null,'aaa','aaaaaa')");
        echo $rs?"插进去了":"数据没能入库啊!";
        die;
        $data1 = '张三';
        $data2 = [ 'name' => '李四', 'age'  => 18, 'sex'  => '男'];
        $data3 = [
            [ 'name' => '李四1', 'age'  => 181, 'sex'  => '男1'],
            [ 'name' => '李四2', 'age'  => 182, 'sex'  => '男2'],
            [ 'name' => '李四3', 'age'  => 183, 'sex'  => '男3']
        ];

        $this->getView()->assign('data1',$data1);
        $this->getView()->assign('data2',$data2);
        $this->getView()->assign('data3',$data3);
        return $this->getView()->render("test/index.phtml");
        //4. render by Yaf, 如果这里返回FALSE, Yaf将不会调用自动视图引擎Render模板
        return false;
    }
}