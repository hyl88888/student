<?php
include "conn.php";
//先读取该学号的对应的学生信息
$kid = $_REQUEST['kid'];
$sql = "select * from kecheng where 课程编号='{$kid}'";
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
<?php include("head.php"); ?>
<div class="sui-layout" style="height: 550px">
	<div class="sidebar"  style="height:100%;border-right:1px solid #41719c;">
		<!-- 左菜单 -->
		<?php include("leftmenu.php"); ?>
	</div>
	<div class="content">
		<p class="sui-text-xxlarge" style="margin-left: 50px;">课程修改</p>
		<form id="form1" action="kecheng-save.php" method="post" class="sui-form form-horizontal sui-validate">
			<div class="control-group">
				<label for="inputEmail" class="control-label">课程名:</label>
				<div class="controls">
					<!-- 增加一个input，用来区分是新增加的数据还是修改数据 -->
					<input type="hidden" name="action" value="update">
					<!-- 增加一个隐藏的input，保存课程编号 -->
					<input type="hidden" id="kid" name="kid" value="<?php echo $row['课程编号'] ?>">

					<input type="text" value="<?php echo $row['课程名']; ?>" id="KcNam" name="KcName" class="input-large input-fat" placeholder="输入课程名称" data-rules="required|minlength=2|maxlength=10">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">课程时间:</label>
				<div class="controls">
					<input type="text" value="<?php echo $row['时间']; ?>" id="KcTime" name="KcTime" class="input-large input-fat" data-toggle="datepicker" placeholder="输入课程名称">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label"></label>
				<div class="controls">
					<input type="submit" value="修改" class="sui-btn btn-xlarge btn-primary">
				</div>
			</div>
		</form>
	</div>
</div>
<?php include "foot.php"; ?>