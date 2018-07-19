<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/17 0017
 * Time: 下午 8:47
 */
class BaseController extends Yaf_Controller_Abstract{
    /**
     * 操作成功的跳转
     * @param string $url  跳转的url
     * @param string $message 提示信息
     * @param int $time  延迟跳转时间
     */
    public function success($url,$message="操作成功",$time=1){
        $this->jump($url,$message,$time,"success");
    }

    /**操作失败的跳转
     * @param string $url  跳转的url
     * @param string $message 提示信息
     * @param int $time 延迟跳转时间
     */
    public function error($url,$message="操作失败",$time=1){
        $this->jump($url,$message,$time,"error");
    }
    /**
     * 跳转方法
     * @param string $url  需跳转url
     * @param string $message  提示信息
     * @param int $time  延迟跳转时间
     * @param string $status  跳转状态
     */
    private function jump($url,$message,$time=1,$status="success"){
        echo <<<STR
        <!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="refresh" content="{$time};URL={$url}">
<title>提示页面</title>
<style type="text/css">
#img{text-align:center;margin-top:50px;margin-bottom:20px;}
.info{text-align:center;font-size:24px;font-family:'微软雅黑';font-weight:bold;}
#success{color:#060;}
#error{color:#F00;}
</style>
</head> 
<body>
    <div id="img"><img src="/application/public/message/{$status}.fw.png" width="160" height="200" /></div>
    <div id='{$status}' class="info">{$message}</div>
</body>
</html>
STR;
        exit;
    }

}