<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/16 0016
 * Time: 下午 7:46
 */
namespace frontend\controllers;

use frontend\models\Msg;
use Yii;
use yii\web\Controller;

class MsgController extends Controller{
    public $layout=false;
    public $enableCsrfValidation = false;
    public function actionIndex()
    {
        $request = Yii::$app->request;
        if($request->isPost){
            $created_at=strtotime($request->post('created_at')?:'');
            $updated_at=strtotime($request->post('updated_at')?:'');
            if(!$created_at){
                $msgs=Msg::find()->
                where(['<','created_at',$updated_at])->
                all();
            }elseif(!$updated_at){
                $msgs=Msg::find()->
                where(['>','created_at',$created_at])->
                all();
            }else{
                $msgs=Msg::find()->
                where(['and',['>','created_at',$created_at],['<','created_at',$updated_at]])->
                all();
            }
        }else{
            $msgs=Msg::find()->all();
        }
        $created_at=$request->post('created_at')?:'';
        $updated_at=$request->post('updated_at')?:'';
        return $this->render('index',compact('msgs','created_at','updated_at'));
    }
    public function actionAdd(){
        $request = Yii::$app->request;
        if($request->isPost){
            $uname=$request->post('uname');
            $content=$request->post('content');
            $msgModel=new Msg();
            $msgModel->uname=$uname;
            $msgModel->content=$content;
            $msgModel->created_at=$msgModel->updated_at=time();
            $msgModel->save();
            return $this->redirect(['/msg']);
        }
    }

    public function actionQuery(){

    }
}