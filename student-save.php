<?php
/* creater db168@ 2018-09-04*/
//接收student-input.php提交过来的信息
$sID = $_REQUEST['sID'];
$sName = $_REQUEST['sName'];
$bjNumber = $_REQUEST['bjNumber'];
$sBrithday = $_REQUEST['sBrithday'];
$sSex = $_REQUEST['sSex'];
$sPhone = $_REQUEST['sPhone'];
$action = $_REQUEST['action'];
$id = empty($_REQUEST['id'])?"null":$_REQUEST['id'];
if ((($_FILES['file']['type'] == 'image/gif')||($_FILES['file']['type'] == 'image/png')||($_FILES['file']['type'] == 'video/mp4')||($_FILES['file']['type'] == 'image/jpeg')||($_FILES['file']['type'] == 'image/pjpeg'))&&($_FILES['file']['size'] < 10241000)){
  if($_FILES["file"]["error"] > 0){
    echo "错误: " . $_FILES["file"]["error"] . "<br />";
  }else{
    $filename = "upload/".date('YmdHis').$_FILES["file"]["name"];
    move_uploaded_file($_FILES["file"]["tmp_name"],$filename);
  }
}else{
  $filename = 1;
}

include "conn.php";
if( $action == "add"){
	$str = "数据插入成功！";
	$str2 = "数据插入失败！";
	$url = "student-input.php";
	$sql = "insert into student(学号,班号,图片,姓名,性别,出生日期,电话) value('{$sID}','{$bjNumber}','{$filename}','{$sName}',{$sSex},'{$sBrithday}','{$sPhone}')";
}else if($action == "update"){
	//修改记录
	$str = "数据修改成功！";
	$str2 = "数据修改失败！";
	$url = "student-list-ajax.php";
	$sql = "update student set 学号='{$sID}',班号='{$bjNumber}',图片='{$filename}',姓名='{$sName}',性别={$sSex},出生日期='{$sBrithday}',电话='{$sPhone}' where id={$id}";
}else{
	die("请选择操作方法"); //die() 输出提示语并终止下面的代码执行。
}

	$result = mysqli_query($conn, $sql);
	if($result){
		//echo "数据插入成功！";
		echo "<p class='pp'>$str</p>";
		//页面指定2秒后跳转
		header("Refresh:1;url='{$url}'");
	}else{
		echo "<p class='pp'>$str2</p>".mysqli_error($conn);
	}

//4、关闭连接，释放资源
mysqli_close($conn );

?>