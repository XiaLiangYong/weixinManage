<?php

?>
<section class="Hui-article-box">
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 公众号列表 <span
                class="c-gray en"></span> <a class="btn btn-success radius r"
                                                      style="line-height:1.6em;margin-top:3px"
                                                      href="javascript:location.replace(location.href);" title="刷新"><i
                    class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="Hui-article">
        <article class="cl pd-20">
            <div class="cl pd-5 bg-1 bk-gray"><span class="l"> <a
                            class="btn btn-primary radius" href="javascript:;"
                            onclick="admin_role_add('添加公众号','admin-role-add.html','800')"><i class="Hui-iconfont">&#xe600;</i> 添加公众号</a> </span>
                <span class="r">共有数据：<strong>54</strong> 条</span></div>
            <div class="mt-10">
                <table class="table table-border table-bordered table-hover table-bg">
                    <thead>
                    <tr></tr>
                    <tr class="text-c">
                        <th width="40">ID</th>
                        <th width="200">公众号</th>
                        <th width="200">appid</th>
                        <th width="200">appsecret</th>
                        <th width="200">encodingaeskey</th>
                        <th width="200">更新时间</th>
                        <th width="70">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="text-c">
                        <td>1</td>
                        <td>公众号</td>
                        <td>appid</td>
                        <td>appsecret</td>
                        <td>encodingaeskey</td>
                        <td>更新时间</td>
                        <td>操作</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </article>
    </div>
</section>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="<?= Yii::getAlias('@web') ?>/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript"
        src="<?= Yii::getAlias('@web') ?>/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= Yii::getAlias('@web') ?>/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
    /*管理员-角色-添加*/
    function admin_role_add(title, url, w, h) {
        layer_show(title, url, w, h);
    }
    /*管理员-角色-编辑*/
    function admin_role_edit(title, url, id, w, h) {
        layer_show(title, url, w, h);
    }
    /*管理员-角色-删除*/
    function admin_role_del(obj, id) {
        layer.confirm('角色删除须谨慎，确认要删除吗？', function (index) {
            //此处请求后台程序，下方是成功后的前台处理……


            $(obj).parents("tr").remove();
            layer.msg('已删除!', {icon: 1, time: 1000});
        });
    }
</script>