<?php
	include("conn.php");
		// 邮箱
		$email = empty($_REQUEST['email']) ? "null":strtolower($_REQUEST['email']);
		// 用户名
	    $userm = empty($_REQUEST['userm']) ? "null":$_REQUEST['userm'];
	    // 密码
	    $password = empty($_REQUEST['password']) ? "null":$_REQUEST['password'];
	    // 密码提示
	    $question = empty($_REQUEST['question']) ? "null":$_REQUEST['question'];
	    // 答案
	    $answer = empty($_REQUEST['answer']) ? "null":$_REQUEST['answer'];
	    // 选择有没有邮件名称一样的
	    $scc="select email,name,password,question,answer from user where email = '{$email}'";
		$rcc = mysqli_query($conn,$scc);
		if (mysqli_num_rows($rcc) >=1) {
			echo "<div class='tishi'>此邮件已经重复注册</div>";
			// echo "<script>$('.pp').slideDown(50);</script>";
			header("Refresh:1;url=regiser.php");
			// die();
		}else{
			$sql="insert into user(email,name,password,question,answer) value('$email','$userm','$password','$question','$answer')";
			$result = mysqli_query($conn,$sql);
			if ($result) {
			echo "<div class='tishi'>注册成功</div>";
			header("Refresh:1;url=login.php");
			}else{
			echo "<div class='tishi'>注册失败</div>".mysqli_error($conn);
			header("Refresh:1;url=regiser.php");
			}
		}
	mysqli_close($conn);
 ?>
<style>
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
	margin:50px auto;
}
</style>