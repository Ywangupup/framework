<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/17 0017
 * Time: 下午 8:07
 */
class MsgController extends BaseController{
    public function indexAction(){
        $msgModel=new MsgModel();
        $msgs=$msgModel->get("select * from msg");
        $this->getView()->assign("msgs", $msgs);
        return $this->getView()->render("msg/index.phtml");
        //4. render by Yaf, 如果这里返回FALSE, Yaf将不会调用自动视图引擎Render模板
        return false;
    }
    public function addAction(){
        if($this->getRequest()->isPost()){
            $uname=$this->getRequest()->getPost('uname');
            $content=$this->getRequest()->getPost('content');
            $created_at=time();
            $rs=(new MsgModel())->add("insert into msg VALUES(null,$uname,$content,$created_at,$created_at)");
            if($rs){
                $this->success("/msg/index","操作成功");
            }else{
                $this->error("/msg/index","操作成功");
            }
        }
        return false;
    }
}