<?php
include "conn.php";
$surname = $_REQUEST['surname'];
$xuehao = $_REQUEST['xuehao'];

$sql = "select * from student where 姓名='{$surname}' and 学号='{$xuehao}'";
$result = mysqli_query($conn,$sql);


?>
<?php include "head.php"; ?>
<div class="sui-layout" style="height: 550px">
		  <div class="sidebar" style="height:100%;border-right:1px solid #41719c;">
<?php include "leftmenu.php" ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd label-success">学生信息查询</p>
			<table class="sui-table table-bordered" style="width: 680px">
				<thead>
				    <tr>
				      <th>编号</th>
				      <th>学号</th>
				      <th>班号</th>
				      <th>姓名</th>
				      <th>性别</th>
				      <th>出生日期</th>
				      <th>电话</th>
				    </tr>
				</thead>
				<tbody>
					<?php
						if(mysqli_num_rows($result)>0){
							while ($row = mysqli_fetch_assoc($result)) {
								$row1 = $row['性别']==1?'男':'女';
								echo "<tr>";
								echo "<td>{$row['id']}</td>";
								echo "<td>{$row['学号']}</td>";
								echo "<td>{$row['班号']}</td>";
								echo "<td>{$row['姓名']}</td>";
								echo "<td>{$row1}</td>";
								echo "<td>{$row['出生日期']}</td>";
								echo "<td>{$row['电话']}</td>";
								echo "</tr>";
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