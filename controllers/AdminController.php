<?php
/**
 * Created by PhpStorm.
 * User: xialiangyong
 * Date: 2017/5/19
 * Time: 16:07
 */

namespace app\controllers;


class AdminController extends AuthController
{
    /**
     * 后台首页
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * 角色管理
     * @return string
     */
    public function actionRole()
    {
        return $this->render('role');
    }


    /**
     * 权限管理
     * @return string
     */
    public function actionPermission()
    {
        return $this->render('permission');
    }

    /**
     * 管理员列表
     */
    public function actionList()
    {
        return $this->render('list');
    }
}