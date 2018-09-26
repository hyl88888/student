<?php
include 'conn.php';
$sql = "select 课程编号 from kecheng";
$result = mysqli_query($conn,$sql);
?>
<?php include "head.php" ?>
		<div class="sui-layout" style="height: 550px">
		  <div class="sidebar" style="height:100%;border-right:1px solid #41719c;">
<?php include "leftmenu.php" ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">成绩录入</p>
			<form class="sui-form form-horizontal sui-validate" action="chengji-save.php" method="post">

				<!-- 技巧：增加一个隐藏的input，用来区分是新增的还是修改记录 -->
				<input type="hidden" name="action" value="add">

			  <div class="control-group">
			    <label for="xueHao" class="control-label">学号：</label>
			    <div class="controls">
			      <input type="text" id="xueHao" name="xueHao" class="input-large input-fat" placeholder="输入学生学号" data-rules="required|minlength=6|maxlength=6">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="xBhao" class="control-label">课程编号：</label>
			    <div class="controls">
			      <select id="xBhao" name="xBhao">
			      	<?php
			      		if(mysqli_num_rows($result)>0){
			      			while ($row = mysqli_fetch_assoc($result)) {
			      				echo "<option value='{$row['课程编号']}'>{$row['课程编号']}</option>";
			      			}
			      		}else{
			      			echo "<option value=''>暂无班级信息</option>";
			      		}
			      	?>
			      </select>
			    </div>
			  </div>
			  <div class="control-group">
				<label for="xChengji" class="control-label">成绩:</label>
				<div class="controls">
					<input type="text" id="xChengji" name="xChengji" class="input-large input-fat" data-rules="required" placeholder="输入成绩">
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