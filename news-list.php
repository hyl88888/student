<?php
include 'conn.php';
$sql = "select id,标题,肩题,图片,内容,发布时间,创建时间,userid,columnid from news";
$result = mysqli_query($conn,$sql);
//关闭数据库
mysqli_close($conn);
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
				      <th>id</th>
				      <th>新闻标题</th>
				      <th>时间</th>
				      <th>操作</th>
				    </tr>
				</thead>
				<tbody>
					<?php
						if(mysqli_num_rows($result)>0){
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>";
								echo "<td>{$row['id']}</td>";
								echo "<td>{$row['标题']}</td>";
								echo "<td>{$row['发布时间']}</td>";
								echo "<td><a class='sui-btn btn-samll btn-warning' href='news-update.php?sid={$row['id']}'>修改</a>
										&nbsp;&nbsp;
										<a class='sui-btn btn-samll btn-danger' href='news-del.php?sid={$row['id']}'>删除</a></td>";
								echo "</tr>";
							}
						}else{
							echo "<tr><td >暂无记录</td></tr>";
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