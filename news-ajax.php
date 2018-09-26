<?php 
	include("conn.php");
	$sql = "select distinct * from news";
  	$result = mysqli_query($conn, $sql);
  	if (mysqli_num_rows($result)>0){
			$stdentlist = array();
			while ($row = mysqli_fetch_assoc($result)){
				$stdentlist[] = $row;
			}
			$responseArr["data"] = $stdentlist;
		}else{
			$responseArr["code"] = 207;
			$responseArr["msg"] = "暂无记录";
		}
		die(json_encode($responseArr));
	mysqli_close($conn);
?>
