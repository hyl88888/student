<?php
include 'conn.php';
$surname = $_REQUEST['surname'];
$xuehao = $_REQUEST['xuehao'];
$keCheng = $_REQUEST['keCheng'];
//判断姓名input是否有值，有则返回name，没有返回student保存到变量中
$xuanze = empty($_REQUEST['surname'])?"student1":"name";
if($xuanze == 'name'){
	$sql1 ="select * from xuanxiu as x left join kecheng as k on x.课程编号 = k.课程编号 left join student as s on x.学号 = s.学号 where s.姓名 = '{$surname}' and k.课程名 = '{$keCheng}'";
}else if($xuanze == 'student1'){
	$sql1 = "select * from xuanxiu as x left join kecheng as k on x.课程编号=k.课程编号 left join student as s on x.学号=s.学号 where x.学号='{$xuehao}' and k.课程名='{$keCheng}'";
}else{
	//输出内容中断执行
	die("请选择操作方法");
}
$result = mysqli_query($conn,$sql1);

?>

<?php include "head.php" ?>
		<div class="sui-layout" style="height: 550px">
		  <div class="sidebar" style="height:100%;border-right:1px solid #41719c;">
<?php include "leftmenu.php" ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd label-success">成绩信息查询</p>
			<table class="sui-table table-bordered" style="width: 680px">
				<thead>
				    <tr>
				      <th>姓名</th>
				      <th>课程名</th>
				      <th>成绩</th>
				    </tr>
				</thead>
				<tbody>
					<?php
						if(mysqli_num_rows($result)>0){
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>";
								echo "<td>{$row['姓名']}</td>";
								echo "<td>{$row['课程名']}</td>";
								echo "<td>{$row['成绩']}</td>";
							}
						}else{
							echo "<tr><td >暂无学生记录</td></tr>";
						}
					?>
				</tbody>
			</table>
		  </div>
		</div>
	</div>
</body>
</html>
<?php include "foot.php"; ?>