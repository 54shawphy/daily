<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="__PUBLIC__/css/site.css">
	<script src="__PUBLIC__/js/jquery-2.1.4.min.js"></script>
    <title></title>
</head>
<body>
<section class="container">
	<div class="g-600 login-panel" style="margin-top:0 " id="login-wrapper">
		<div class="box-shadow">
			<h1 class="singleHead">用户注册</h1>
			<form id="regForm" class="ui-form" method="post" action="index.php?c=Index&a=regPost">
				<div class="error">
					</div>
				<div class="ui-form-item">
					<label class="ui-label" for="username">帐 号:</label>
					<input class="ui-input" type="text" id="username" name="username" value="" placeholder="请输入您的姓名">
				</div>
				<div class="ui-form-item">
					<label class="ui-label" for="email">邮 箱:</label>
					<input class="ui-input" type="text" id="email" name="email" value="" placeholder="请输入邮箱">
				</div>
				<div class="ui-form-item">
					<label class="ui-label" for="password">密 码:</label>
					<input class="ui-input" type="password" id="password" name="password" placeholder="请输入密码">
				</div>
				<div class="ui-form-item">
					<label class="ui-label" for="group">分 组:</label>
					<select name="group" style="width: 447px; height: 40px; border: 1px solid #ddd;">
						<?php if(is_array($group)): $i = 0; $__LIST__ = $group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</div>
				<!--
				<div class="fbox captcha">
					<label for="captcha">验 证 码：</label>
					<input type="text" id="captcha" name="captcha" maxlength="4" />
					<img id="captchaImg" src="/static/captcha.jspx" alt="captcha" />
				</div>
				 -->
				<div class="login-bar cl">
					<span class="fl">已有账号？</span>
					<a class="mgr10 fl"  href="?c=Index&a=login">立即登录</a>
					<a class="fr" style="display: none;" href="/password">忘记密码？</a>

				</div>
				<div class="fmes-bar">
					<button type="submit" class="btn btn-lg btn-primary mgl160">注 册</button>
				</div>
			</form>
		</div>
		</div>
</section>
</body>
<script src="__PUBLIC__/js/reg.js"></script>
</html>