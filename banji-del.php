<?php
/*
	班级删除
created db168@ 2018-09-04
*/
$uid = empty($_REQUEST["uid"])?"null":$_REQUEST["uid"];
if($uid == null){
	echo "<script>alert('请指定要删除的记录')</script>";
	header("Refresh:1;url=banji-list.php");
}else{
	//执行删除操作
	include 'conn.php';
	$result = mysqli_query($conn,"delete from banji where 班号='{$uid}'");
	if($result){
		echo "<script>alert('数据删除成功')</script>";
		header("Refresh:1;url=banji-list.php");
	}else{
		echo "数据删除失败".mysqli_error($conn);
	}
	//别忘了关闭数据库连接
	mysqli_close($conn);
}
?>