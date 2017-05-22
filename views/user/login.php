<?php
use yii\helpers\Url;

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="lib/html5.js"></script>
    <script type="text/javascript" src="lib/respond.min.js"></script>
    <![endif]-->
    <link href="<?= Yii::getAlias('@web') ?>/css/H-ui.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?= Yii::getAlias('@web') ?>/css/H-ui.login.css" rel="stylesheet" type="text/css"/>
    <link href="<?= Yii::getAlias('@web') ?>/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="<?= Yii::getAlias('@web') ?>/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css"/>
    <!--[if IE 6]>
    <script type="text/javascript" src="<?= Yii::getAlias('@web') ?>/js/DD_belatedPNG_0.0.8a-min.js"></script>
    <script>DD_belatedPNG.fix('*');</script><![endif]-->
    <title>微信后台管理</title>
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value=""/>
<div class="header"></div>
<div class="loginWraper">
    <div id="loginform" class="loginBox">
        <form id="fom" class="form form-horizontal" action="<?= Url::toRoute('user/login') ?>" method="post">
            <div class="row cl">
                <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
                <div class="formControls col-xs-8">
                    <input id="username" name="username" type="text" placeholder="账户" class="input-text size-L"
                           required="*">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
                <div class="formControls col-xs-8">
                    <input id="password" name="password" type="password" placeholder="密码" class="input-text size-L"
                           required="*">
                </div>
            </div>
            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <input class="input-text size-L" name="code" type="text" placeholder="验证码" style="width:150px;"
                           required="*">
                    <?= \yii\captcha\Captcha::widget(['name' => 'captchaimg', 'captchaAction' => 'user/captcha', 'imageOptions' => ['id' => 'captchaimg', 'title' => '换一个', 'alt' => '换一个'], 'template' => '{image}']); ?>
                </div>
            </div>
            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <input name="" type="submit" class="btn btn-success radius size-L"
                           value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;" onclick="sumit()">
                </div>
            </div>
        </form>
    </div>
</div>
<div class="footer">
    Copyright <?= '© 2014-' . date('Y', $_SERVER['REQUEST_TIME']) . ' ' . Yii::$app->params['ICPLicense'] ?> <a
            href="http://www.xialiangyong.com" target="_blank">贝贝博客</a>
</div>

<script type="text/javascript" src="<?= Yii::getAlias('@web') ?>/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="<?= Yii::getAlias('@web') ?>/js/H-ui.js"></script>
</body>
</html>