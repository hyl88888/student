<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css">
	<link rel="stylesheet" type="text/css" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui-append.min.css">
	<style>
		.sui-layout{
			width: 700px;
			height: 450px;
			border:1px solid #41719c;
			margin: 0px auto;
			position: relative;
			background-color: #f8f8f8;
			border-radius:5px;
			margin-top: 10px;
		}
		.zhuce{
			width: 100px;
			height: 40px;
			text-align: center;
			line-height: 40px;
			border:1px solid #41719c;
			border-bottom: none;
			border-radius: 10px 10px 0 0;
			margin-top: 10px;
			position:absolute;
			left:245px;
		}
		.denglu{
			width: 100px;
			height: 40px;
			text-align: center;
			line-height: 40px;
			border:1px solid #41719c;
			border-bottom: none;
			border-radius: 10px 10px 0 0;
			margin-top: 10px;
			position:absolute;
			left:355px;
		}
		.denglu a,.zhuce a{
			font-size: 18px;
			text-decoration:none;
		}
		#tips{
			color: red;
		}
		.tishi{
			width: 400px;
			height: 80px;
			text-align: center;
			line-height: 80px;
			background-color: skyblue;
			color: white;
			font-size: 25px;
			border-radius: 8px;
			border:1px solid #ccc;
			display: none;
			position: absolute;
			top: 70%;
			left: 20%;
		}

		.sui-layout{
			-webkit-animation-name: fadeIn;/*  动画名称 */
			-webkit-animation-duration: 5s;/*  动画持续时间 */
			-webkit-animation-iteration-count: 1; /* 动画次数 */
			-webkit-animation-delay: 0s; /* 延迟时间 */

		}
		@-webkit-keyframes fadeIn {
			0% {
				opacity: 0;/*  初始状态 透明度为0 */
			}
			50% {
				opacity: 0.5;/*  中间状态 透明度为0 */
			}
			100% {
				opacity: 1; /* 结尾状态 透明度为1 */
			}
		}
		.emailError{
			width: 320px;
			height: 120px;
			background: rgb(0,0,0,0.3);
			line-height: 120px;
			font-size: 30px;
			color: white;
			border-radius: 20px;
			position: absolute;
			top: 300px;
			left: 190px;
			display: none;
		}
		.passError{
			width: 320px;
			height: 120px;
			background: rgb(0,0,0,0.3);
			line-height: 120px;
			font-size: 30px;
			color: white;
			border-radius: 20px;
			position: absolute;
			top: 300px;
			left: 190px;
			display: none;
		}
	</style>
</head>
<body>
	<div class="sui-layout">
		<div class="zhuce" style="">
			<a href="register.php">注册</a>
		</div>
		<div class="denglu">
			<a href="login.php">登录</a>
		</div>
	  	<div style="text-align: center;height: 400px;border-top:1px solid #ccc;margin-top: 50px;">