<?php
/*create db168@ 2018-09-04*/
//接收kecheng-input.php提交过来的信息

$KcName = $_REQUEST['KcName'];
$KcTime = $_REQUEST['KcTime'];
$action = $_REQUEST['action'];
$kid = empty($_REQUEST["kid"])?"add":$_REQUEST["kid"];

include 'conn.php';

	if($action == "add"){
		$str = "数据插入成功！";
		$str2 = "数据插入失败！";
		$url = "kecheng-input.php";
		$sql = "insert into kecheng(课程名,时间) value('{$KcName}','{$KcTime}')";
	}else if($action == "update"){
		$str = "数据修改成功！";
		$str2 = "数据修改失败！";
		$url = "kecheng-list.php";
		$sql = "update kecheng set 课程名='{$KcName}',时间='{$KcTime}' where 课程编号={$kid}";
	}else{
		die("请选择操作方法");//die()输出提示语并终止下面的代码执行
	}

		// echo $sql;
	$result = mysqli_query($conn,$sql);
	if($result){
		echo "<script>alert({$str});</script>";
		//页面指定2秒后跳转
		header("Refresh:1;url={$url}");
	}else{
		echo "{$str2}".mysqli_error($conn);
	}
//4.关闭链接，释放资源
mysqli_close($conn);

?>