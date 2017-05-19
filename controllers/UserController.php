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