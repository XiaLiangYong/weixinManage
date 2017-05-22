/**
 * Created by alibeibei on 2017/5/12.
 */
/**
 * Created by lzq on 2016/11/30.
 */

/*g.js依赖于jQuery及layer 故使用时需置于其后*/
;(function ($) {
    var g = {};
    g.vars = {};
    g.actions = {};
    g.assets = {};
    g.timers = {};
    g.ui = {
        //加载层
        loading: function (action, type) {
            if (action === 'close') {
                layer.closeAll('loading'); //关闭加载层
            } else {
                layer.load(type ? type : 0);
            }
        },
        //提示层
        tips: function (message, callback, time) {
            layer.msg(message, {time: time ? time * 1000 : 2000});
        },
        // 普通信息框
        alert: function (message, callback) {
            layer.alert(message, function (index) {
                layer.close(index);
                $.isFunction(callback) && callback.apply(this);
            });
        },
        //警告层
        warn: function (message, callback, time) {
            layer.msg(message, {
                icon: 7,
                time: time ? time * 1000 : 2000,
            })
        },
        //成功层
        success: function (message, callback, time) {
            layer.msg(message, {
                icon: 6,
                time: time ? time * 1000 : 2000,
                end: function () {
                    $.isFunction(callback) && callback.apply(this);
                }
            });
        },
        //失败层
        error: function (message, callback, time) {
            layer.msg(message, {
                icon: 2,
                time: time ? time * 1000 : 2000,
                end: function () {
                    $.isFunction(callback) && callback.apply(this);
                }
            });
        },
        //确认层
        confirm: function (message, yes, no) {
            layer.confirm(message, {
                    time: 0, //不自动关闭
                btn: ['确定', '取消'],
                title: '温馨提示',
                shade: 0.6,
                shadeClose: true, //点击阴影关闭
                yes: function (index) {
                    layer.close(index);
                    $.isFunction(yes) && yes.apply(this);
                },
                cancel: function (index) {
                    layer.close(index);
                    $.isFunction(no) && no.apply(this);
                }
            });
        },
        //对话框
        dialog: function (url, title, width, height) {
            height = Math.min(height || 597, $(window).height() - 50);
            width = Math.min(width || 960, $(window).width() - 30);
            layer.open({
                type: 2,
                shadeClose: true,
                maxmin: true,
                title: title || "窗口",
                shade: [0.8, '#000'],
                area: [width + 'px', height + 'px'],
                shift: -1,
                content: url + ((url.indexOf('?') > -1 ? '&' : '?') + '_dialog=1')
            });
        },
        //关闭自身层
        closeSelf: function () {
            var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
            parent.layer.close(index); //再执行关闭
        },
        //关闭所有层
        closeAll: function () {
            layer.closeAll();
        },
    };
    //重载
    g.reload = function () {
        window.location.reload();
    };
    //重新加载所有
    g.reload_all = function () {
        g.ui.loading();
        window.location.reload();
    };
    //跳转
    g.location = function (url) {
        window.location.href = url;
    };
    //ajax 提交
    g.ajax = function (url, data, success, error, complete) {
        $.ajax({
            url: url,
            data: data,
            type: 'post',
            dataType: 'json',
            beforeSend: function () {
                g.ui.loading();
            },
            complete: function (xhr) {
                g.ui.loading('close');
                $.isFunction(complete) && complete.apply(this);
            },
            success: function (res) {
                if (res.status && res.status === 'success') {
                    if (res.message) {
                        g.ui.success(res.message);
                    }
                    $.isFunction(success) && success.apply(this, [res]);
                } else {
                    if (res.message) {
                        g.ui.error(res.message, error);
                    }
                    $.isFunction(error) && error.apply(this, [res]);
                }
            },
            error: function () {
                g.ui.error('无法提交,请检查网络连接是否正常');
            }
        });
    };


    //延迟加载
    g.loader = function (plugin, callback) {
        var arr = plugin.split(','), files = [];
        if (!$.isFunction(callback)) {
            callback = function () {
            };
        }
        for (var i = 0; i < arr.length; i++) {
            if (!g.assets) {
                console.error("未定义g.assets");
                return false;
            }
            if (!g.assets[arr[i]]) {
                console.error("未定义g.assets的 " + arr[i]);
                return false;
            }
            if (g.assets[arr[i]].css) {
                for (var n = 0; n < g.assets[arr[i]].css.length; n++) {
                    var id = "loader_css_" + arr[i] + '_' + n;
                    if ($('#' + id).size() === 0) {
                        var el = document.createElement("link");
                        el.setAttribute('type', 'text/css');
                        el.setAttribute('rel', 'stylesheet');
                        el.setAttribute('id', id);
                        el.setAttribute('href', g.assets[arr[i]]['css'][n]);
                        $("head")[0].appendChild(el);
                    }
                }
            }
            if (g.assets[arr[i]].js) {
                files = files.concat(g.assets[arr[i]].js);
            }
        }

        var a = null;
        for (var i = 0; i < files.length; i++) {
            if (i === 0) {
                a = $LAB.script(files[i]);
            } else {
                a = a.script(files[i]);
            }
        }
        a.wait(callback);
    };
    //表单验证
    g.validSubmit = function (selector, success, error) {
        g.loader('validator', function () {
            $(selector).validator({
                msgMaker: false,    //不要自动生成消息
                valid: function (form) {
                    var me = this;
                    me.holdSubmit();
                    var btn = $(form).find('button[type="submit"]') || $(form).find('input[type="submit"]'), ohtml = btn.html();
                    var data = $(form).serialize(), url = $(form).attr('action') || '';
                    $.ajax({
                        url: url,
                        data: data,
                        type: 'post',
                        dataType: 'json',
                        beforeSend: function () {
                            g.ui.loading();
                            btn.attr('disabled', 'disabled').html('...');
                        },
                        complete: function (xhr) {
                            g.ui.loading('close');
                            btn.removeAttr('disabled').html(ohtml);
                            me.holdSubmit(false);
                        },
                        success: function (res) {
                            if (res.status && res.status === 'success') {
                                if (res.message) {
                                    g.ui.success(res.message);
                                }
                                $.isFunction(success) && success.apply(this, [res]);
                            } else {
                                if (res.message) {
                                    g.ui.error(res.message, error);
                                }
                                $.isFunction(error) && error.apply(this, [res]);
                            }
                        },
                        error: function () {
                            g.ui.error('无法提交,请检查网络连接是否正常');
                        }
                    });
                    return false;
                }
            }).on('validation', function (e, current) {  //显示错误消息
                var span = $('#span-' + ($(current.element).attr('data-name') || $(current.element).attr('name')));
                if (!current.isValid) { //未通过验证
                    $(current.element).addClass('n-invalid');
                    if (!span.attr('data-origin-msg')) {
                        span.attr('data-origin-msg', span.text());
                    }
                    span.addClass('text-danger').removeClass('help-block').html('<i class="fa fa-warning"></i> ' + current.msg);
                } else {
                    $(current.element).removeClass('n-invalid');
                    if (span.attr('data-origin-msg')) {
                        span.html('<i class="fa fa-info-circle"></i> ' + span.attr('data-origin-msg'))
                    }
                    span.removeClass('text-danger').addClass('help-block');
                }
            });
        });
    };

    //搜索
    g.search = function (button) {
        var self = $(button), form = self.closest('form');
        window.location.href = CURRENT_URL + '/index.php?'+form.serialize();
        return false;
    };

    window.g = g;
})(jQuery);