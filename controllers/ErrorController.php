<?php
/**
 * Created by PhpStorm.
 * User: xialiangyong
 * Date: 2017/5/19
 * Time: 15:54
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;

class ErrorController extends Controller
{
    public function actionIndex()
    {
        $exception = Yii::$app->errorHandler->exception;
        if (!empty($exception)) {
            if (!isset($exception->statusCode) || (isset($exception->statusCode) && $exception->statusCode != 400)) {
                if ($exception->statusCode == 404) {
                   return  $this->render('404');
                }
            }
        }
    }
}