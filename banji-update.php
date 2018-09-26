<?php
include "conn.php";
//先读取该学号的对应的学生信息
$uid = $_REQUEST['uid'];
$sql = "select * from banji where 班号='{$uid}'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
	//将查询结果转换为数组
	/*while ($row = mysqli_fetch_assoc($result2)) {
		# code...
	}*/
	//因为确认只有一条记录，因此可不用while循环
	$row = mysqli_fetch_assoc($result);

}else{
	echo "找不到该学生信息，请验证学号是否正确";
}
?>
<?php include "head.php" ?>
		<div class="sui-layout" style="width: 550px;">
		  <div class="sidebar" style="height:100%;border-right:1px solid #41719c;">
<?php include "leftmenu.php" ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">班级信息修改</p>
			<form class="sui-form form-horizontal sui-validate" action="banji-save.php" method="post">
				<!-- 技巧：增加一个隐藏的input，用来区分是新增的还是修改记录 -->
				<input type="hidden" name="action" value="update">
				<!-- 增加一个隐藏的input，用来保存id -->
				<input type="hidden" id="uid" name="uid" value="<?php echo $row['班号'] ?>">

			  <div class="control-group">
			    <label for="kcName" class="control-label">班号：</label>
			    <div class="controls">
			      <input type="text" id="banhao" name="banhao" value="<?php echo $row['班号']; ?>" class="input-large input-fat" placeholder="输入班号" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">班长：</label>
			    <div class="controls">
			      <input type="text" id="banzhang" name="banzhang" value="<?php echo $row['班长']; ?>" class="input-large input-fat"  placeholder="输入班长姓名" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="jiaoshi" class="control-label">教室：</label>
			    <div class="controls">
			      <input type="text" id="jiaoshi" name="jiaoshi" value="<?php echo $row['教室']; ?>" class="input-large input-fat"  placeholder="输入教室" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="banzhuren" class="control-label">班主任：</label>
			    <div class="controls">
			      <input type="text" id="banzhuren" name="banzhuren" value="<?php echo $row['班主任']; ?>" class="input-large input-fat"  placeholder="输入班主任姓名">
			    </div>
			  </div>
			  <div class="control-group">
				<label for="inputEmail" class="control-label">班级口号:</label>
				<div class="controls">
					<input id="motto" name="motto" value="<?php echo $row['班级口号']; ?>" placeholder="输入班级口号" data-rules="required"></input>
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