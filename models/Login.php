<?php
/**
 * Created by PhpStorm.
 * User: xialiangyong
 * Date: 2017/5/19
 * Time: 17:13
 */

namespace app\models;


use yii\base\Model;

class Login extends Model
{
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['verifyCode', 'verifyCode']
        ];
    }


}