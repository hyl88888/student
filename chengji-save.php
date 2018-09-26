<?php
/*create db168@ 2018-09-04*/
//接收chengji-input.php提交过来的信息

$xueHao = $_REQUEST['xueHao'];
$xBhao = $_REQUEST['xBhao'];
$xChengji = $_REQUEST['xChengji'];
$action = $_REQUEST['action'];
$kid = empty($_REQUEST["kid"])?"null":$_REQUEST["kid"];
include 'conn.php';

	if($action == "add"){
		$str = "数据插入成功！";
		$str2 = "数据插入失败！";
		$url = "chengji-input.php";
		$sql = "insert into xuanxiu(学号,课程编号,成绩) value('{$xueHao}','{$xBhao}','{$xChengji}')";
	}else if($action == "update"){
		$str = "数据修改成功！";
		$str2 = "数据修改失败！";
		$url = "chengji-list.php";
		$sql = "update xuanxiu set 学号='{$xueHao}',课程编号='{$xBhao}',成绩='{$xChengji}' where 学号='{$kid}'";
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