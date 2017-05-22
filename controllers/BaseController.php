<?php
/**
 * Created by PhpStorm.
 * User: xialiangyong
 * Date: 2017/5/19
 * Time: 13:52
 */

namespace app\controllers;


use yii\web\Controller;

class BaseController extends Controller
{

    /**
     * 检查是否登录
     */
    protected function isLogin()
    {
        $fun = \Yii::$app->Fun;
        return $fun->getSession('username') ? true : false;
    }

    /**
     * 获取用户昵称
     */
    protected function getUserName()
    {
        $fun = \Yii::$app->Fun;
        return $fun->getSession('username');
    }
}