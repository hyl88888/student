<?php
/*
	课程删除
created db168@ 2018-09-03
*/
$kid = empty($_REQUEST["kid"])?"null":$_REQUEST["kid"];
if($kid == null){
	echo "<script>alert('请指定要删除的记录')</script>";
	header("Refresh:1;url=student-list.php");
}else{
	//执行删除操作
	include 'conn.php';
	$result = mysqli_query($conn,"delete from kecheng where 课程编号='{$kid}'");
	if($result){
		echo "<script>alert('数据删除成功');</script>";
		header("Refresh:1;url=kecheng-list.php");
	}else{
		echo "数据删除失败".mysqli_error($conn);
	}
	//别忘了关闭数据库连接
	mysqli_close($conn);
}
?>