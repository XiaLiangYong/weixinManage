<?php
/**
 * Created by PhpStorm.
 * User: xialiangyong
 * Date: 2017/5/19
 * Time: 13:53
 */

namespace app\controllers;


use app\models\User;
use yii\helpers\Url;

class UserController extends BaseController
{

    public $layout = false;

    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'backColor' => 0xFFFFFF,  //背景颜色
                'minLength' => 4,  //最短为4位
                'maxLength' => 4,   //是长为4位
                'transparent' => true,  //显示为透明
                'testLimit' => 0,
                'fixedVerifyCode' => YII_ENV_TEST ? 'test' : null,
            ],
        ];
    }

    /**
     * 登录
     */
    public function actionLogin()
    {
        if (\Yii::$app->request->isPost && !$this->isLogin()) {
            //处理业务逻辑
            $username = \Yii::$app->request->post('username');
            $password = \Yii::$app->request->post('password');
            $code = \Yii::$app->request->post('code');
            $fun = \Yii::$app->Fun;
            if ($this->createAction('captcha')->getVerifyCode(false) == $code) {
                $userInfo = User::find()->where(['name' => $username])->limit(1)->asArray()->one();
                if (empty($userInfo)) {
                    return $this->goBack();
                }
                if ($userInfo['pwd'] != md5(md5($password))) {
                    return $this->goBack();
                }
                $fun->setSession('username', $username);
                $index = Url::toRoute('admin/index');
                return $this->redirect($index);
            } else {
                $fun->setCookie('errorAlert', '验证码不正确');
                //验证码不正确
                return $this->goBack();
            }
        }
        return $this->render('login');
    }

    /**
     * 登出
     */
    public function actionLoginout()
    {

    }

}