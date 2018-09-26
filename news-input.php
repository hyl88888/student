<?php include "head.php" ?>
<?php
include 'conn.php';
$sql = "select name from newscolumn";
$result = mysqli_query($conn,$sql);



?>
		<div class="sui-layout" style="height: 550px">
		  <div class="sidebar" style="height:100%;border-right:1px solid #41719c;">
<?php include "leftmenu.php" ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">新闻发布</p>
			<form class="sui-form form-horizontal sui-validate" action="news-save.php" method="post" enctype="multipart/form-data">

				<!-- 技巧：增加一个隐藏的input，用来区分是新增的还是修改记录 -->
				<input type="hidden" name="action" value="add">

			  <div class="control-group">
			    <label for="titles" class="control-label">标题：</label>
			    <div class="controls">
			      <input type="text" id="titles" name="titles" class="input-large input-fat" placeholder="输入新闻标题">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="kicker" class="control-label">肩题：</label>
			    <div class="controls">
			      <input type="text" id="kicker" name="kicker" class="input-large input-fat" placeholder="输入新闻肩题">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="Column" class="control-label">栏目：</label>
			    <div class="controls">
			      <select  name="Column" id="Column">
			      	<?php
			      		if(mysqli_num_rows($result)>0){
			      			while ($row = mysqli_fetch_assoc($result)) {
			      				echo "<option value='{$row['name']}'>{$row['name']}</option>";
			      			}
			      		}else{
			      			echo "<option value=''>暂无信息</option>";
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
					<input type="file" name="file">
					<img src="<?php echo $row['图片']; ?>" width="100px" height="120px">
				</div>
			</div>
			  <div class="control-group">
			  	<label for="Issue" class="control-label">发布时间：</label>
			  	<div class="controls">
					<input type="text" name="Issue" id="Issue" class="input-large input-fat" data-toggle="datepicker" placeholder="请选择发布时间">
				</div>
			  </div>
			  <div class="control-group">
			  	<label for="Content" class="control-label">内容：</label>
			  	<div class="controls">
  					<textarea rows="3" id="Content" name="Content" placeholder="输入内容" data-rules="required"></textarea>
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