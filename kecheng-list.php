<?php
include("head.php");
include("conn.php");

$allNum = allNews(); //总记录数
$pageSize = 5; //约定每页显示几条信息
$pageNum = empty($_GET["pageNum"])?1:$_GET["pageNum"];//默认从1开始
$endPage = ceil($allNum/$pageSize); //总页数
$array = news($pageNum,$pageSize); //根据页码得到分页记录

//显示总记录数的函数
function allNews()
{
	global $conn;
	$sql2 = "select count(*) as allnum from kecheng"; //可以显示出总页数
	$r = mysqli_query($conn, $sql2);
	$obj = mysqli_fetch_assoc($r);
	//关闭数据连接
	//mysqli_close( $conn );
	return $obj["allnum"];
}
//分页的函数
function news($pageNum = 1, $pageSize)
{
	global $conn;
    $array = array();
    // limit为约束显示多少条信息，后面有两个参数，第一个为从第几个开始，第二个为长度
    $rs = "select * from kecheng limit " . (($pageNum - 1) * $pageSize) . "," . $pageSize;
    $r = mysqli_query($conn, $rs);
    while ($obj = mysqli_fetch_assoc($r)) {
        $array[] = $obj;
        //var_dump($array);
    }
    //mysqli_close( $conn );
    return $array;

}
//关闭数据连接
mysqli_close( $conn );
?>
		<div class="sui-layout" style="height: 550px">
		  <div class="sidebar" style="height:100%;border-right:1px solid #41719c;">
			<!--左菜单-->
			<?php include("leftmenu.php"); ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd label-success">课程列表</p>
			<table class="sui-table table-bordered" style="width: 680px">
				<tr>
					<th>课程编号</th>
					<th>课程名</th>
					<th>时间</th>
					<th>操作</th>
				</tr>
<?php

    foreach($array as $key=>$values){
        echo "<tr>";
        echo "<td>{$values["课程编号"]}</td>";
        echo "<td>{$values["课程名"]}</td>";
        echo "<td>{$values["时间"]}</td>";
        echo "<td><a class='sui-btn btn-small btn-warning' href='kecheng-update.php?kid={$values['课程编号']}'>修改</a>&nbsp;&nbsp;
<a class='sui-btn btn-small btn-danger' href='kecheng-del.php?kid={$values['课程编号']}'>删除</a></td>";
        echo "</tr>";
    }
?>
			</table>
			<div>
				总计：<?php echo $allNum; ?>条记录
			    <a href="?pageNum=1">首页</a>
			    <a href="?pageNum=<?php echo $pageNum==1?1:($pageNum-1)?>">上一页</a>
			<?php
				//总页数
				$pageAmount = ceil($allNum / $pageSize);
				for($i = 1 ; $i <= $pageAmount ; $i++){
				echo "<a href=?pageNum={$i}>{$i}</a>&nbsp";
		 		}
		 	?>
			    <a href="?pageNum=<?php echo $pageNum==$endPage?$endPage:($pageNum+1)?>">下一页</a>
			    <a href="?pageNum=<?php echo $endPage?>">尾页</a>
			</div>
		  </div>
		</div>
<?php include("foot.php"); ?>