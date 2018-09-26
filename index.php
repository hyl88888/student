<?php include "head.php" ?>
		<div class="sui-layout" style="height: 550px">
		  <div class="sidebar" style="height:100%;border-right:1px solid #41719c;">
			<?php include "leftmenu.php" ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd label-success">欢迎访问学生管理系统！</p>
			<div class="xinwen_box">
				<ul id="xinwen_box"></ul>
			</div>
		  </div>
		</div>
	</div>
</body>
</html>
<?php include "foot.php"; ?>
<script>
window.onload = function(){
	$.ajax({
	url     : "news-ajax.php",
	type    : "POST",
	dataType: "json",
	success : function(data,textStatus){
	var str = "";
		for (var i=0; i < data.data.length; i++) {
			console.log(data.data[i].id);
			str += "<li class='lis'><a href='xinwenye.php?kid="+data.data[i].id+"'><img src='"+ data.data[i].图片 + "' style='width:240px;height:150px;'></a>"+"<br>"+"<a href='xinwenye.php'>" + data.data[i].标题 + "</a><br>"+"<span class='jt'>"+ data.data[i].肩题 +"</span>"+"<br>"+"<span class='fbsj'>" + data.data[i].发布时间 + "</span>" +"<p>" + data.data[i].内容 + "</p>"+"</li>";
		}
		$("#xinwen_box").html(str);
	},
	error   : function(XMLHttpRequest,textStatus,errorThrown){
	// 请求失败后调用此函数
	console.log("失败原因：" + errorThrown);
	}
	});
}
</script>