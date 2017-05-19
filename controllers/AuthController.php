<?php
/**
 * Created by PhpStorm.
 * User: xialiangyong
 * Date: 2017/5/19
 * Time: 15:12
 */

namespace app\controllers;


class AuthController extends BaseController
{

    /**
     * 角色管理
     * @return string
     */
    public function actionAdminRole()
    {
        return $this->render('admin-role');
    }


    /**
     * 权限管理
     * @return string
     */
    public function actionAdminPermission()
    {
        return $this->render('admin-permission');
    }



}