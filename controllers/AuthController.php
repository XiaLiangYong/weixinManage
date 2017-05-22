<?php
/**
 * Created by PhpStorm.
 * User: xialiangyong
 * Date: 2017/5/19
 * Time: 15:12
 */

namespace app\controllers;


use yii\helpers\Url;

class AuthController extends BaseController
{
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            //先判断登录情况
            if (!$this->isLogin()) {
                $loginIndex = Url::toRoute('user/login');
                return $this->redirect($loginIndex);
            }
            //权限判断
            $module = $this->module->id;
            $controller = $this->id;
            $action = $this->action->id;
            return true;
        }
    }


}