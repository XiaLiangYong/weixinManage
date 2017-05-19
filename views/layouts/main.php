<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="renderer" content="webkit|ie-comp|ie-stand">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport"
              content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
        <meta http-equiv="Cache-Control" content="no-siteapp"/>
        <link rel="Bookmark" href="favicon.ico">
        <link rel="Shortcut Icon" href="favicon.ico"/>
        <!--[if lt IE 9]>
        <script type="text/javascript" src="<?=Yii::getAlias('@web')?>/lib/html5.js"></script>
        <script type="text/javascript" src="<?=Yii::getAlias('@web')?>/lib/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web') ?>/css/H-ui.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web') ?>/css/H-ui.admin.css"/>
        <link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web') ?>/lib/Hui-iconfont/1.0.8/iconfont.css"/>

        <link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web') ?>/skin/default/skin.css" id="skin"/>
        <link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web') ?>/css/style.css"/>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <header class="navbar-wrapper">
        <div class="navbar navbar-fixed-top">
            <div class="container-fluid cl"><a class="logo navbar-logo f-l mr-10 hidden-xs" href="#">微信后台管理</a>
                <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/aboutHui.shtml">H-ui</a> <a
                        aria-hidden="false"
                        class="nav-toggle Hui-iconfont visible-xs"
                        href="javascript:;">&#xe667;</a>
                <nav class="nav navbar-nav">
                </nav>
                <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
                    <ul class="cl">
                        <li>超级管理员</li>
                        <li class="dropDown dropDown_hover"><a href="#" class="dropDown_A">admin <i
                                        class="Hui-iconfont">&#xe6d5;</i></a>
                            <ul class="dropDown-menu menu radius box-shadow">
                                <li><a href="javascript:;" onClick="myselfinfo()">个人信息</a></li>
                                <li><a href="#">切换账户</a></li>
                                <li><a href="<?= Url::toRoute('user/loginout'); ?>">退出</a></li>
                            </ul>
                        </li>
                        <li id="Hui-msg"><a href="#" title="消息"><span class="badge badge-danger">1</span><i
                                        class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a></li>
                        <li id="Hui-skin" class="dropDown right dropDown_hover"><a href="javascript:;"
                                                                                   class="dropDown_A" title="换肤"><i
                                        class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
                            <ul class="dropDown-menu menu radius box-shadow">
                                <li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
                                <li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
                                <li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
                                <li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
                                <li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
                                <li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <!--_menu 作为公共模版分离出去-->
    <aside class="Hui-aside">

        <div class="menu_dropdown bk_2">
            <dl id="menu-admin">
                <dt><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
                </dt>
                <dd>
                    <ul>
                        <li><a href="<?= Url::toRoute('admin/role') ?>" title="角色管理">角色管理</a></li>
                        <li><a href="<?= Url::toRoute('admin/permission') ?>" title="权限管理">权限管理</a></li>
                        <li><a href="<?= Url::toRoute('admin/list') ?>" title="管理员列表">管理员列表</a></li>
                    </ul>
                </dd>
            </dl>
            <dl id="menu-system">
                <dt><i class="Hui-iconfont">&#xe62e;</i> 系统管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i>
                </dt>
                <dd>
                    <ul>
                        <li><a href="system-base.html" title="系统设置">系统设置</a></li>
                        <li><a href="system-category.html" title="栏目管理">栏目管理</a></li>
                        <li><a href="system-data.html" title="数据字典">数据字典</a></li>
                        <li><a href="system-shielding.html" title="屏蔽词">屏蔽词</a></li>
                        <li><a href="system-log.html" title="系统日志">系统日志</a></li>
                    </ul>
                </dd>
            </dl>
        </div>
    </aside>
    <div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a>
    </div>
    <!--/_menu 作为公共模版分离出去-->
    <?php $this->beginBody() ?>
    <?= $content ?>
    <!--_footer 作为公共模版分离出去-->
    <script type="text/javascript" src="<?= Yii::getAlias('@web') ?>/lib/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?= Yii::getAlias('@web') ?>/lib/layer/2.4/layer.js"></script>
    <script type="text/javascript"
            src="<?= Yii::getAlias('@web') ?>/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
    <script type="text/javascript"
            src="<?= Yii::getAlias('@web') ?>/lib/jquery.validation/1.14.0/validate-methods.js"></script>
    <script type="text/javascript"
            src="<?= Yii::getAlias('@web') ?>/lib/jquery.validation/1.14.0/messages_zh.js"></script>
    <script type="text/javascript" src="<?= Yii::getAlias('@web') ?>/js/H-ui.js"></script>
    <script type="text/javascript" src="<?= Yii::getAlias('@web') ?>/js/H-ui.admin.page.js"></script>

    <!--/_footer /作为公共模版分离出去-->
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>