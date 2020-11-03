<!doctype html>
<html class="x-admin-sm">
<head>
    <meta charset="UTF-8">
    <title>后台登录-X-admin2.2</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="stylesheet" href="/admin/css/font.css">
    <link rel="stylesheet" href="/admin//css/login.css">
    <link rel="stylesheet" href="/admin//css/xadmin.css">
    <script type="text/javascript" src="/admin/js/JQuery.js"></script>
    <script src="/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script src="/admin/js/vue.js" charset="utf-8"></script>
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-bg">

<div class="login layui-anim layui-anim-up">
    <div class="message">x-admin2.0-管理登录</div>
    <div id="darkbannerwrap"></div>

    <form method="post" class="layui-form">
        <input name="username" placeholder="用户名" type="text" lay-verify="required" class="layui-input"
               value="{{old('username')}}">
        <hr class="hr15">
        <input name="password" lay-verify="required" placeholder="密码" type="password" class="layui-input"
               value="{{old('password')}}">
        <hr class="hr15">
        <input name="captcha" placeholder="验证码" type="text" lay-verify="required" class="layui-input"
               value="{{old('captcha')}}">
        <img src="{{captcha_src()}}" onclick="this.src='{{captcha_src()}}'" width="90" height="35"
             title="点击图片重新获取验证码">
        <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
        <hr class="hr20">
    </form>

</div>

<script>
    $(function () {
        layui.use('form', function () {
            var form = layui.form;
            // layer.msg('玩命卖萌中', function(){
            //   //关闭后的操作
            //   });
            //监听提交
            form.on('submit(login)', function (data) {
                data = data.field;
                $.post('/admin/logincheck', {
                    '_token': '{{csrf_token()}}',
                    'username': data.username,
                    'password': data.password,
                    'captcha': data.captcha
                }, function (datas) {
                    if (datas.code == 1) {
                        // layer.msg('登录成功', function () {
                        //     location.href = '/admin/index';
                        // });

                        layer.msg('登录成功', {icon: 1, time: 1000}, function () {
                            location.href = '/admin/index';
                        });
                    } else {
                        layer.msg(datas.msg);
                    }
                });
                return false;
            });
        });
    })
</script>
<!-- 底部结束 -->
<script>
    //百度统计可去掉
    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
</body>
</html>