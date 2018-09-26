<?php include "head.php" ?>

<?php
include 'conn.php';
$sid = empty($_REQUEST["sid"])?"null":$_REQUEST["sid"];
if ($sid == "null") {
	die ("请选择要修改的记录");
}else{
include ('conn.php');
//执行SQL语句
$sql = "select * from news where id='{$sid}'";
$sql1 = "select name from newscolumn";
$result = mysqli_query($conn,$sql);
$result1 = mysqli_query($conn,$sql1);
// 输出数据
if (mysqli_num_rows($result) > 0){
	//将查找到
	$row = mysqli_fetch_assoc($result);
}else{
	echo "找不到该记录";
}
//关闭数据库
mysqli_close($conn);
}
?>

		<div class="sui-layout" style="height: 550px">
		  <div class="sidebar" style="height:100%;border-right:1px solid #41719c;">
<?php include "leftmenu.php" ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">新闻发布</p>
			<form class="sui-form form-horizontal sui-validate" action="news-save.php" method="post" enctype="multipart/form-data">

				<!-- 技巧：增加一个隐藏的input，用来区分是新增的还是修改记录 -->
				<input type="hidden" name="action" value="update">
				<!-- 增加一个隐藏的input，保存id -->
				<input type="hidden" name="sid" value="<?php echo $row['id'] ?>">

			  <div class="control-group">
			    <label for="titles" class="control-label">标题：</label>
			    <div class="controls">
			      <input type="text" id="titles" name="titles" class="input-large input-fat" placeholder="输入新闻标题" value="<?php echo $row['标题']; ?>">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="kicker" class="control-label">肩题：</label>
			    <div class="controls">
			      <input type="text" id="kicker" name="kicker" class="input-large input-fat" placeholder="输入新闻肩题" value="<?php echo $row['肩题']; ?>">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="Column" class="control-label">栏目：</label>
			    <div class="controls">
			      <input type="hidden" name="Column" id="Column" >
					<select  name="Column" id="Column" value="<?php echo $row['columnid'];?>">
						<?php
							//如果查找到的班号返回长度大于0执行while进行判断
							if( mysqli_num_rows($result1) > 0 ){
								//将结果中的班号转换为数组赋值给$row
								while ( $row1 = mysqli_fetch_assoc($result1) ) {
									//输出结果下拉菜单.value值和内容都都为sql语句取到的班号
									echo "<option value='{$row1['name']}'>{$row1['name']}</option>";
								}
							//如果没有查找到输出其他语句
							}else{
								echo "<option value=''>请先添加栏目信息</option>";
							}
						?>
					</select>
			    </div>
			  </div>
			  <div class="control-group">
				<label for="inputEmail" class="control-label">作者:</label>
				<div class="controls">
					<input type="text" id="author" name="author" class="input-large input-fat" data-rules="required" placeholder="输入作者名称" value="<?php echo $_SESSION['usname']; ?>" readonly>
				</div>
			  </div>
			  <div class="control-group">
				<label for="inputEmail" class="control-label" id="picture" name="picture">图片:</label>
				<div class="controls">
					<input type="file" name="file" value="<?php echo $row['图片']; ?>">
            		<img src="<?php echo $row['图片']; ?>" width="120px" height="140px" style="margin-left: -167px;">
				</div>
			</div>
			  <div class="control-group">
			  	<label for="Issue" class="control-label">发布时间：</label>
			  	<div class="controls">
					<input type="text" name="Issue" id="Issue" class="input-large input-fat" data-toggle="datepicker" placeholder="请选择发布时间" value="<?php echo $row['发布时间']; ?>">
				</div>
			  </div>
			  <div class="control-group">
			  	<label for="Content" class="control-label">内容：</label>
			  	<div class="controls">
  					<textarea rows="3" id="Content" name="Content" placeholder="输入内容" data-rules="required"><?php echo $row['内容']; ?></textarea>
			  	</div>
			  </div>
			  <div class="control-group">
			  	<label class="control-label"></label>
			  	<div class="controls">
			  		<input type="submit" value="发布" name="" class="sui-btn btn-large btn-primary">
			  	</div>
			  </div>
			</form>
		  </div>
		</div>
	</div>
</body>
</html>
<?php include "foot.php"; ?>