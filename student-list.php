<?php
include 'conn.php';
$sql = "select * from student";
$result = mysqli_query($conn,$sql);
?>
<?php include "head.php" ?>
		<div class="sui-layout" style="height: 550px">
		  <div class="sidebar" style="height:100%;border-right:1px solid #41719c;">
<?php include "leftmenu.php" ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd label-success">学生信息管理</p>
			<table class="sui-table table-bordered" style="width: 680px">
				<thead>
				    <tr>
				      <th>序号</th>
				      <th>学号</th>
				      <th>姓名</th>
				      <th>性别</th>
				      <th>出生日期</th>
				      <th>电话</th>
				      <th>操作</th>
				    </tr>
				</thead>
				<tbody>
					<?php
						$i = 0;
						if(mysqli_num_rows($result)>0){
							while ($row = mysqli_fetch_assoc($result)) {
								$i++;
								echo "<tr>";
								echo "<td>{$i}</td>";
								echo "<td>{$row['学号']}</td>";
								echo "<td>{$row['姓名']}</td>";
								if($row['性别'] == 0){
									echo "<td>女</td>";
								}else{
									echo "<td>男</td>";
								}
								echo "<td>{$row['出生日期']}</td>";
								echo "<td>{$row['电话']}</td>";
								echo "<td><a class='sui-btn btn-samll btn-warning' href='student-update.php?sid={$row['学号']}'>修改</a>
										&nbsp;&nbsp;
										<a class='sui-btn btn-samll btn-danger' href='student-del.php?sid={$row['学号']}'>删除</a></td>";
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