<?php
namespace Home\Controller;
use Think\Controller;
class MsgController extends Controller {
    public function index(){
        $msgs=M('Msg')->select();
        $this->assign('msgs',$msgs);
        $this->display("index");
    }
    public function add(){
        if(IS_POST){
            $postData=I('post.');
            $postData['created_at']= $postData['updated_at']=time();
            $rs=M('msg')->add($postData);
            if($rs){
                $this->success("评论成功",U('msg/index'));
            }else{
                $this->error('评论失败',U('msg/index'));
            }
        }
    }
}