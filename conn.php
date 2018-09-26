<?php
//链接数据库
//1.登录链接数据库
$conn = mysqli_connect("localhost","root","");
// if($conn){
// 	echo "链接数据库成功";
// }else{
// 	echo "链接失败";
// }
//2.选择要操作的数据库
mysqli_select_db($conn,"student");
//设置读取数据库的编码，不然有可能显示乱码
mysqli_query($conn,"set names utf8");
?>