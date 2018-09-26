<?php
$kid = empty($_REQUEST["kid"])?"null":$_REQUEST["kid"];
if ($kid == "null") {
	die ("请选择要修改的记录");
}else{
include ('conn.php');

//执行SQL语句
$sql = "select * from xuanxiu where 学号='{$kid}'";

$result = mysqli_query($conn,$sql);

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
<?php include "head.php" ?>
		<div class="sui-layout" style="height: 550px">
		  <div class="sidebar" style="border-right:1px solid #41719c;">
<?php include "leftmenu.php" ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">成绩信息修改</p>
			<form class="sui-form form-horizontal sui-validate" action="chengji-save.php" method="post">

				<!-- 技巧：增加一个隐藏的input，用来区分是新增的还是修改记录 -->
				<input type="hidden" name="action" value="update">

				<!-- 增加一个隐藏的input，用来保存id -->
				<input type="hidden" name="kid" value="<?php echo $row['学号']; ?>">

			  <div class="control-group">
			    <label for="xueHao" class="control-label">学号：</label>
			    <div class="controls">
			      <input type="text" id="xueHao" name="xueHao" value="<?php echo $row['学号']; ?>" class="input-large input-fat" placeholder="输入学生学号" data-rules="required|minlength=6|maxlength=6">
			    </div>
			  </div>
			  <div class="control-group">
    			<label class="control-label" for="xBhao">课程编号：</label>
   				<div class="controls">
					<input type="text" id="xBhao" name="xBhao" value="<?php echo $row['课程编号']; ?>" class="input-large input-fat" placeholder="输入课程编号" data-rules="required|minlength=2|maxlength=10">
   				 </div>
 			</div>
			  <div class="control-group">
				<label for="xChengji" class="control-label">成绩:</label>
				<div class="controls">
					<input type="text" id="xChengji" name="xChengji" value="<?php echo $row['成绩']; ?>" class="input-large input-fat" data-rules="required" placeholder="输入成绩">
				</div>
			  </div>
			  <div class="control-group">
			  	<label class="control-label"></label>
			  	<div class="controls">
			  		<input type="submit" value="修改" name="" class="sui-btn btn-large btn-primary">
			  	</div>
			  </div>
			</form>
		  </div>
		</div>
	</div>
</body>
</html>
<?php include "foot.php"; ?>