<?php
/*create db168@ 2018-09-04*/
//接收banji-input.php提交过来的信息

$banhao = $_REQUEST['banhao'];
$banzhang = $_REQUEST['banzhang'];
$jiaoshi = $_REQUEST['jiaoshi'];
$banzhuren = $_REQUEST['banzhuren'];
$motto = $_REQUEST['motto'];
$action = $_REQUEST['action'];
$uid = empty($_REQUEST["uid"])?"null":$_REQUEST["uid"];
include 'conn.php';
	echo $action;
	if($action == "add"){
		$str = "数据插入成功！";
		$str2 = "数据插入失败！";
		$url = "banji-input.php";
		$sql = "insert into banji(班号,班长,教室,班主任,班级口号) value('{$banhao}','{$banzhang}','{$jiaoshi}','{$banzhuren}','{$motto}')";
	}else if($action == "update"){
		$str = "数据修改成功！";
		$str2 = "数据修改失败！";
		$url = "banji-list.php";
		$sql = "update banji set 班号='{$banhao}',班长='{$banzhang}',教室='{$jiaoshi}',班主任='{$banzhuren}',班级口号='{$motto}' where 班号='{$uid}'";
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