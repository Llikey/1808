<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="author" content="order by dede58.com"/>
    <title>会员登录</title>

    <link rel="stylesheet" type="text/css" href="./css/login.css">

    <script src="{{asset('layui/JQuery.js')}}"></script>
    <link rel="stylesheet" href="{{asset('layui/css/layui.css')}}">
    <script src="{{asset('layui/layui.all.js')}}"></script>

</head>
</head>
<body>
<!-- login -->
<div class="top center">
    <div class="logo center">
        <a href="./index.html" target="_blank"><img src="./image/mistore_logo.png" alt=""></a>
    </div>
</div>
<form method="post" action="./login.php" class="form center">
    <div class="login">
        <div class="login_center">
            <div class="login_top">
                <div class="left fl">会员登录</div>
                <div class="right fr">您还不是我们的会员？<a href="./register.html" target="_self">立即注册</a></div>
                <div class="clear"></div>
                <div class="xian center"></div>
            </div>
            <div class="login_main center">
                <div class="username">用户名:&nbsp;<input class="shurukuang" type="text" name="username" id="username"
                                                       value="{{old('username')}}"
                                                       placeholder="请输入你的用户名"/></div>
                <div class="username">密&nbsp;&nbsp;&nbsp;&nbsp;码:&nbsp;<input class="shurukuang" type="password"
                                                                              name="password" id="password"
                                                                              placeholder="请输入你的密码"/>
                </div>
                <div class="username">
                    <div class="left fl">验证码:&nbsp;<input class="yanzhengma" type="text" name="username" id="captcha"
                                                          placeholder="请输入验证码"/></div>

                    <img src="{{captcha_src()}}">
                    <div class="right fl">
                    <!--   <img src="{{url('/captcha')}}" onclick="this.src='{{url('/captcha')}}'" width="90" height="35" title="点击图片重新获取验证码"> -->
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="username">手机号:&nbsp;<input class="shurukuang" type="text" name="username" id="shojihao"
                                                       placeholder="请输入手机号"/></div>

                <div class="username">
                    <div class="left fl">验证码:&nbsp;<input class="yanzhengma" type="text" name="username" id="yanzhenma"
                                                          placeholder="请输入验证码"/></div>
                    <input type="hidden" id="shojiyanzhengma">
                    <div class="right fl">
                        <input type="button" value="获取验证码" onclick="func()">
                    </div>
                    <div class="clear"></div>
                </div>
            </div>


            <div class="login_submit">
                <input class="submit" type="button" id="send" name="submit" value="立即登录">
            </div>

        </div>
    </div>
</form>
<footer>
    <div class="copyright">简体 | 繁体 | English | 常见问题</div>
    <div class="copyright">小米公司版权所有-京ICP备10046444-<img src="./image/ghs.png" alt="">京公网安备11010802020134号-京ICP证110507号
    </div>
</footer>
</body>
<script>
    document.onkeydown = function (event) {
        var e = event || window.event || arguments.callee.caller.arguments[0];
        if (e && e.keyCode == 13) { // enter 键
            $('#send').click();
        }
    };

    function func() {
        shojihao = $('#shojihao').val();
        $.ajax({
            type: "post",
            url: "{:url('login/yanzhegma')}",
            data: {shojihao: shojihao},
            success: function (data) {
                $('#shojiyanzhengma').val(data.data);
            }
        });
    }

    $('#send').click(function () {
        var username = $('#username').val();
        var password = $('#password').val();
        var captcha = $('#captcha').val();
        var yanzhenma = $('#yanzhenma').val();

        if (username == '') {
            layer.msg('用户名不能为空');
        } else if (password == '') {
            layer.msg('密码不能为空');
        } else {
            $("#send").attr('disabled', "true");
            $.ajax({
                type: "post",
                url: "/hh",
                data: {'_token': '{{csrf_token()}}', username: username, password: password, captcha: captcha},
                success: function (data) {
                    if (data.code != 1) {
                        layer.msg(data.msg);
                        $('#send').removeAttr("disabled");
                    } else {
                        layer.msg(data.msg, {icon: 1, time: 1000}, function () {
                            window.location.href = data.data;
                        });
                    }
                }
            });

        }
    });


</script>
</html>