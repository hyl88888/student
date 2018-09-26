<?php
/*create  2018-09-04*/
//接受news-input.php提交出来的信息
session_start();
$titles = $_REQUEST['titles'];//新闻标题
$kicker = $_REQUEST['kicker'];//新闻肩题
$Column = $_REQUEST['Column'];//栏目
$author = $_REQUEST['author'];//作者
$Issue = $_REQUEST['Issue'];//发布时间
$content = $_REQUEST['Content'];//内容
$action = $_REQUEST['action'];

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

$sql1 = "select * from newscolumn where name='{$Column}'";
$result2 = mysqli_query($conn,$sql1);
if(mysqli_num_rows($result2)>0){
	$row2 = mysqli_fetch_assoc($result2);
}

if($action == "add"){
	//新增记录
	$a = time();
	$str = "数据插入成功";
	$str2 = "数据插入失败";
	$url = 'news-input.php';
	$sql = "insert into news(标题,肩题,图片,内容,发布时间,创建时间,userid,columnid) values('{$titles}','{$kicker}','{$filename}','{$content}','{$Issue}','$a','{$author}','{$row2['id']}')";//增
}else if ($action == "update") {
	//修改记录
	$sid = $_REQUEST['sid'];
	$str = "数据更新成功";
	$str2 = "数据更新失败";
	$url = 'news-list.php';

	$sql3 = "select * from news where id='{$sid}'";
	$result3 = mysqli_query($conn,$sql3);
	if(mysqli_num_rows($result3)>0){
		$row3 = mysqli_fetch_assoc($result3);
	}

	if($filename == 1){
		$filename = $row3['图片'];
	}
	$sql = "update news set 标题='{$titles}',肩题='{$kicker}',图片='{$filename}',内容='{$content}',发布时间='{$Issue}',userid='{$author}' where id='{$sid}'";
}else{
	die("请选择操作方法");
}
		$result = mysqli_query($conn,$sql);
		if($result){
			echo $str;
			header("Refresh:1;url={$url}");
		}else{
			echo $str2;
			header("Refresh:1;url={$url}");
		}
		mysqli_close($conn);
?>

