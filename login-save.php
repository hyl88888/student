<?php

	include("conn.php");
		// 邮箱
		$email = empty($_POST['email']) ? "null":strtolower($_POST['email']);
	    // 密码
	    $password = empty($_POST['password']) ? "null":$_POST['password'];

	    $sql="select id,email,name,password,question,answer from user where email='{$email}' and password='{$password}'";
		$rcc = mysqli_query($conn,$sql);
		if (mysqli_num_rows($rcc) >=1) {
			session_start();
			// 创建一个session，键为usname,值为$mail
			$_SESSION['usemail'] = $email;
			echo "<script>alert('登录成功')document.cookie='usemail={$email}';</script>";
			header("Refresh:1;url=index.php");
		}else{
			echo "<script>alert('登录失败')</script>".mysqli_error($conn);
			header("Refresh:1;url=login.php");
		}
	mysqli_close($conn);
 ?>