
<?php include "head.php" ?>
		<div class="sui-layout" style="height: 550px">
		  <div class="sidebar" style="height:100%;border-right:1px solid #41719c;">
<?php include "leftmenu.php" ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd label-success">学生信息管理</p>
			<table class="sui-table table-bordered">
			  <thead>
			    <tr>
			      <th>序号</th>
			      <th>学号</th>
			      <th>姓名</th>
			      <th>性别</th>
			      <th>生日</th>
			      <th>电话</th>
			      <th>操作</th>
			    </tr>
			  </thead>
			  <tbody id="studentlist">
<?php
/*	if( mysqli_num_rows($result)>0 ){
		$i = 1;
		while( $row = mysqli_fetch_assoc($result) ){
			echo "<tr>";
			echo "<td>{$i}</td>";
			echo "<td>{$row['学号']}</td>";
			echo "<td>{$row['姓名']}</td>";
			echo "<td>{$row['性别']}</td>";
			echo "<td>{$row['出生日期']}</td>";
			echo "<td>{$row['电话']}</td>";
			echo "<td><a class='sui-btn btn-samll btn-warning' href='student-update.php?sid={$row['学号']}'>修改</a>&nbsp;&nbsp;<a class='sui-btn btn-samll btn-danger' href='student-del.php?sid={$row['学号']}'>删除</a></td>";
			echo "<tr>";
			$i++;
		}

	}else{
		echo "<tr><td>暂无学生记录</td></tr>";
	}*/
?>
			  </tbody>

			</table>
<div class="test sui-pagination pagination-large">
  <ul>
    <li class="prev disabled"><a href="#">«上一页</a></li>
    <li class="active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li class="dotted"><span>...</span></li>
    <li class="next"><a href="#">下一页»</a></li>
  </ul>
  <div><span>共10页&nbsp;</span><span>
      到
      <input type="text" class="page-num"><button class="page-confirm" onclick="alert(1)">确定</button>
      页</span></div>
</div>
		  </div>
		</div>
	</div>
</body>
</html>
<?php include "foot.php"; ?>
<script>
$(function(){
	$.ajax({
		url:"api.php",
		type:"POST",
		dataType:"json",
		data:{
			"action":"student"
		},
		beforeSend:function(XMLHttpRequest){
			$("#studentlist").html("<tr><td>正在查询，请稍后...</td></tr>");
		},
		success:function(data,textStatus){
			console.log( data );
			if( data.code == 200 ){
				//渲染分页条
				$('.test').pagination({
				    pageSize:6,//每页显示条数
				    itemsCount:data.count,//获取记录总条数
				    styleClass: ['pagination-large'],
				    displayPage:5,
				    showCtrl: true,
				    onSelect: function (num) {
				    	console.log( num );
				        getPage(num);
				    }
				});
				//渲染第一页数据
				renderList(data.data);
			}
		},
		error: function(XMLHttpRequest,textStatus,errorThrown){
			//请求失败后调用此函数
			console.log( "失败原因：" + errorThrown );
		}
	});
});

function getPage(pageNum){
	$.ajax({
		url:"api.php",
		type:"POST",
		dataType:"json",
		data:{
			"action":"student",
			"pageNum":pageNum,
			"pageSize":6
		},
		success:function(data,textStatus){
			console.log( data );
			if( data.code == 200 ){
				renderList(data.data);
			}
		}
	})
}

function renderList(datalist){
	var str = "";
	for (var i = 0; i < datalist.length; i++) {
		//console.log( data.data[i] );
		str += "<tr><td>"+ datalist[i].id+"</td><td>"+ datalist[i].学号+"</td><td>"+ datalist[i].姓名+"</td><td>"+ (datalist[i].性别==1?'男':'女')+"</td><td>"+ datalist[i].出生日期+"</td><td>"+ datalist[i].电话+"</td><td><a class='sui-btn btn-samll btn-warning' href='student-update.php?sid="+datalist[i].学号+"'>修改</a>&nbsp;&nbsp;<a class='sui-btn btn-samll btn-danger' href='student-del.php?sid="+datalist[i].学号+"'>删除</a></td></tr>";
	}
	$("#studentlist").html( str );
}
</script>