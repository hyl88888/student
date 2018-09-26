<?php
session_start();
//检测session是否为空，是则跳转到登录页
if( empty($_SESSION['usemail']) ){
	header("Refresh:0;url=login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>班级信息录入</title>
	<link rel="stylesheet" type="text/css" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css">
	<link rel="stylesheet" type="text/css" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui-append.min.css">
	<link rel="stylesheet" type="text/css" href="css/default.css">
	<style>
		#xinwen_box li{
			float: left;
			margin-left: 70px;
		}
		#xinwen_box li a{
			cursor: pointer;
		}
		.content{
			-webkit-animation-name: fadeIn; /* 动画名称 */
			-webkit-animation-duration: 2s;/*  动画持续时间 */
			-webkit-animation-iteration-count: 1; /* 动画次数 */
			-webkit-animation-delay: 0s; /* 延迟时间 */

		}
		.sui-container{
			-webkit-animation-name: fadeIn;/*  动画名称 */
			-webkit-animation-duration: 2s;/*  动画持续时间 */
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

	</style>
</head>
<body>
	<div class="sui-container" style="width: 900px;height: 600px;border:1px solid #41719c;">
		<div class="my-head" style="height: 50px;line-height: 50px;">北京网络职业学院学生管理系统 V2.0
			<div class="userinfo" style="display: inline-block;margin-left: 140px;">
				欢迎
				<span style="color: red;"><?php echo $_SESSION['usemail']; ?></span>
				登录&nbsp;
				<a href="login.php" style="color: red;">退出</a>
			</div>
		</div>
