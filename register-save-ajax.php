<?php
$conn = mysqli_connect("127.0.0.1","root","");

//2、选择要操作的数据库
mysqli_select_db($conn, "student");
//设置读取数据库的编码，不然有可能显示乱码
mysqli_query($conn, "set names utf8");
//执行查询email的sql
$email = $_POST["email"];
$sql = "select * from user where email='{$email}'";
$result = mysqli_query($conn,$sql);
//如果查找的记录有一条，说明此email已经被注册过
if(mysqli_num_rows($result) >0){
	echo "error";
}else{
	echo "oK";
}

mysqli_close($conn);
?>