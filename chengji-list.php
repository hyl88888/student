<?php
include 'conn.php';
$sql = "select * from xuanxiu";
$result = mysqli_query($conn,$sql);
?>
<?php include "head.php" ?>
		<div class="sui-layout" style="height: 550px">
		  <div class="sidebar" style="height:100%;border-right:1px solid #41719c;">
<?php include "leftmenu.php" ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd label-success">成绩信息管理</p>
			<table class="sui-table table-bordered" style="width: 680px">
				<thead>
				    <tr>
				      <th>学号</th>
				      <th>课程编号</th>
				      <th>成绩</th>
				      <th>操作</th>
				    </tr>
				</thead>
				<tbody>
					<?php
						if(mysqli_num_rows($result)>0){
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>";
								echo "<td>{$row['学号']}</td>";
								echo "<td>{$row['课程编号']}</td>";
								echo "<td>{$row['成绩']}</td>";
								echo "<td><a class='sui-btn btn-samll btn-warning' href='chengji-update.php?kid={$row['学号']}'>修改</a>
										&nbsp;&nbsp;
										<a class='sui-btn btn-samll btn-danger' href='chengji-del.php?kid={$row['学号']}'>删除</a></td>";
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