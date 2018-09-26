<?php
// 先读取数据库中班级的班号，然后更新下拉列表，保证班号是更新的
include 'conn.php';
$sql = "select 班号 from banji";
$result = mysqli_query($conn,$sql);
?>
<?php include "head.php" ?>
		<div class="sui-layout" style="height: 550px">
		  <div class="sidebar" style="height:100%;border-right:1px solid #41719c;">
<?php include "leftmenu.php" ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">学生信息录入</p>
			<form class="sui-form form-horizontal sui-validate" action="student-save.php" method="post" enctype="multipart/form-data">

				<!-- 技巧：增加一个隐藏的input，用来区分是新增的还是修改记录 -->
				<input type="hidden" name="action" value="add">

			  <div class="control-group">
			    <label for="sID" class="control-label">学号：</label>
			    <div class="controls">
			      <input type="text" id="sID" name="sID" class="input-large input-fat" placeholder="输入学生学号" data-rules="required|minlength=6|maxlength=6">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="sName" class="control-label">姓名：</label>
			    <div class="controls">
			      <input type="text" id="sName" name="sName" class="input-large input-fat" placeholder="输入学生名称" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="file" class="control-label">图片：</label>
			    <div class="controls">
			      <input type="file" name="file">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="bjNumber" class="control-label">班号：</label>
			    <div class="controls">
			      <select id="bjNumber" name="bjNumber">
			      	<?php
			      		if(mysqli_num_rows($result)>0){
			      			while ($row = mysqli_fetch_assoc($result)) {
			      				echo "<option value='{$row['班号']}'>{$row['班号']}</option>";
			      			}
			      		}else{
			      			echo "<option value=''>暂无班级信息</option>";
			      		}
			      	?>
			      </select>
			    </div>
			  </div>
			  <div class="control-group">
			  	<label for="sBrithday" class="control-label">出生日期：</label>
			  	<div class="controls">
			  		<input type="text" id="sBrithday" name="sBrithday" class="input-fat input-large" placeholder="输入出生日期" data-toggle="datepicker">
			  	</div>
			  </div>
			  <div class="control-group">
			  	<label for="sSex" class="control-label">性别</label>
			  	<div class="controls">
			      <label class="radio-pretty inline checked">
				    <input type="radio" value="1" checked="checked" name="sSex"><span>男</span>
				  </label>
				  <label class="radio-pretty inline">
				    <input type="radio" value="0" name="sSex"><span>女</span>
				  </label>
			  	</div>
			  </div>
			  <div class="control-group">
			  	<label for="sPhone" class="control-label">联系电话：</label>
			  	<div class="controls">
			  		<input type="text" id="sPhone" name="sPhone" class="input-fat input-large" placeholder="输入电话" data-rules="mobile" >
			  	</div>
			  </div>
			  <div class="control-group">
			  	<label class="control-label"></label>
			  	<div class="controls">
			  		<input type="submit" value="提交" name="" class="sui-btn btn-large btn-primary">
			  	</div>
			  </div>
			</form>
		  </div>
		</div>
	</div>
</body>
</html>
<?php include "foot.php"; ?>