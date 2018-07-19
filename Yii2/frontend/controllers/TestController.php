<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Test controller
 */
class TestController extends Controller
{
    public $layout=false;
    public function actionIndex()
    {
        $data=111;
        $arr=['name'=>'步步','age'=>'36c'];
        return $this->render('index',['data'=>$data,'arr'=>$arr]);
    }
}
