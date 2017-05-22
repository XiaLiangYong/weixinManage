<?php
namespace app\components;

use Yii;
use yii\base\Component;
use yii\web\Cookie;


/**
 * Created by PhpStorm.
 * User: xialiangyong
 * Date: 2017/5/22
 * Time: 11:01
 */
class Fun extends Component
{
    /**
     * 设置cookie
     * @param $name
     * @param $value
     * @param $expire 默认一天
     */
    public function setCookie($name, $value, $expire = 86400)
    {
        $cookies = Yii::$app->response->cookies;
        return $cookies->add(new Cookie([
            'name' => $name,
            'value' => $value,
            'expire' => $expire + time(),
        ]));
    }


    /**
     * 获取cookie
     * @param $name
     * @return mixed
     */
    public function getCookie($name)
    {
        $cookies = Yii::$app->request->cookies;
        return $cookies->getValue($name);

    }

    /**
     *删除指定cookie
     * @param $name
     */
    public function removeCookie($name)
    {
        $cookies = Yii::$app->response->cookies;
        return $cookies->remove($name);

    }

    /**
     * 删除所有cookie
     */
    public function removeAllCookies()
    {
        $cookies = Yii::$app->response->cookies;
        return $cookies->removeAll();

    }


    /**
     * 设置session
     * @param $name
     * @param $vaule
     */
    public function setSession($name, $vaule)
    {
        $session = Yii::$app->session;
        return $session->set($name, $vaule);
    }


    /**
     * 获取session
     * @param $name
     * @return mixed
     */
    public function getSession($name)
    {
        $session = Yii::$app->session;
        return $session->get($name);
    }

    /**
     * 删除指定的seesion
     * @param $name
     */
    public function removeSession($name)
    {
        $session = Yii::$app->session;
        return $session->remove($name);
    }

    /**
     * 删除所有的seesion
     */
    public function removeAllSessin()
    {
        $sessipn = Yii::$app->session;
        return $sessipn->removeAll();
    }

}