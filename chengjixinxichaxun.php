<?php include "head.php" ?>
		<div class="sui-layout" style="height: 550px;">
		  <div class="sidebar" style="height:100%;border-right:1px solid #41719c;">
<?php include "leftmenu.php" ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">成绩信息查询</p>
			<form class="sui-form form-horizontal sui-validate" action="chengjixinxichaxun-list.php" method="post">
				<div class="control-group">
					<label for="surname" class="control-label">姓名:</label>
					<div class="controls">
						<input type="text" id="surname" name="surname" class="input-large input-fat" placeholder="输入姓名" data-rules="minlength=2|maxlength=10">
					</div>
				</div>
				<div class="control-group">
					<label for="xuehao" class="control-label">学号:</label>
					<div class="controls">
						<input type="text" id="xuehao" name="xuehao" class="input-large input-fat" placeholder="输入学号" data-rules="minlength=2|maxlength=10">
					</div>
				</div>
				<div class="control-group">
					<label for="keCheng" class="control-label">课程名:</label>
					<div class="controls">
						<input type="text" id="keCheng" name="keCheng" class="input-large input-fat" placeholder="输入课程名" data-rules="required|minlength=2|maxlength=10">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<input type="submit" value="查询" class="sui-btn btn-xlarge btn-primary">
					</div>
				</div>
			</form>
		  </div>
		</div>
	</div>
</body>
</html>
<?php include "foot.php"; ?>