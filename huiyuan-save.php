<?php
	$user = $_REQUEST["user"];
	$username = $_REQUEST["username"];
	$password = $_REQUEST["password"];
	$issue = $_REQUEST["issue"];
	$answer = $_REQUEST["answer"];
	//如果是录入页面提交，那么$action等于add
	$action = empty($_REQUEST["action"])?"add":$_REQUEST["action"];
		if ($action == "add") {
		$str1 = "数据添加成功";
		$str2 = "数据添加失败";
		$url = "huiyuan-update.php";
		$sql1 = "insert into user(email,name,password,question,answer) value('$user','$username','$password','issue','answer')";
	}else if($action == "update"){
		$str1 = "数据更新成功";
		$str2 = "数据更新失败";
		$url = "huiyuan-list.php";
		$kid = $_REQUEST["kid"];
		$sql1 = "update user set email='{$user}',name='{$username}',password='{$password}',question='{$issue}',answer='{$answer}' where id='{$kid}'";
	}else{
		die("请选择操作方法");
	}

	include ('conn.php');
	//执行SQL语句
	$result = mysqli_query($conn,$sql1);

	//输出数据
	if ($result) {
		echo "<script>alert('$str1');</script>";
		header("Refresh:1;url={$url}");
	}else{
		echo "$str2".mysqli_error($conn);
	}

	//关闭数据库
	mysqli_close($conn);
?>