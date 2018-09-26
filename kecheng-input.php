
<?php include("head.php"); ?>
<div class="sui-layout" style="height:550px;">
	<div class="sidebar" style="height:100%;border-right:1px solid #41719c;">
		<!-- 左菜单 -->
		<?php include("leftmenu.php"); ?>
	</div>
	<div class="content">
		<p class="sui-text-xxlarge my-padd">课程录入</p>
		<form id="form1" action="kecheng-save.php" method="post" class="sui-form form-horizontal sui-validate">
			<!-- 技巧：增加一个隐藏的input，用来区分是新增的还是修改记录 -->
			<input type="hidden" name="action" value="add">
			<div class="control-group">
				<label for="inputEmail" class="control-label">课程名:</label>
				<div class="controls">
					<input type="text" name="KcName"  id="KcName" class="input-large input-fat" placeholder="输入课程名称" data-rules="required|minlength=2|maxlength=10">
				</div>
			</div>
			<div class="control-group">
				<label for="inputEmail" class="control-label">课程时间:</label>
				<div class="controls">
					<input type="text" name="KcTime" id="KcTime" class="input-large input-fat" data-toggle="datepicker" placeholder="输入课程名称">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label"></label>
				<div class="controls">
					<input type="submit" value="提交" class="sui-btn btn-xlarge btn-primary">
				</div>
			</div>
		</form>
	</div>
</div>
<?php include "foot.php"; ?>