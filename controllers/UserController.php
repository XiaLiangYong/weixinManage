<?php
/**
 * Created by PhpStorm.
 * User: xialiangyong
 * Date: 2017/5/19
 * Time: 13:53
 */

namespace app\controllers;


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
        return $this->render('login');
    }

    /**
     * 登出
     */
    public function actionLoginout()
    {

    }

}