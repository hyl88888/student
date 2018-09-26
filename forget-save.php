<?php
		// 邮箱
		$Emails = empty($_POST['Emails']) ? "null":$_POST['Emails'];
	    // 密码提示
	    $question = empty($_POST['question']) ? "null":$_POST['question'];
	    // 答案
	    $answer = empty($_POST['answer']) ? "null":$_POST['answer'];
	    // 选择有没有邮件名称一样的
	    $scc="select email,name,password,question,answer from user where email = '{$Emails}' and question='{$question}' and answer='{$answer}'";
		$rcc = mysqli_query($conn,$scc);
		if (mysqli_num_rows($rcc) >=1) {
			echo "<div class='tishi'>验证通过</div>";
			$row = mysqli_fetch_assoc($rcc);
			header("Refresh:1;url=chenggong.php?update='{$row['email']}'");


		}else{
			echo "<div class='tishi'>验证失败</div>";
			header("Refresh:2;url=logon.php");
		}
	mysqli_close($conn);
 ?>
<style>
.tishi{
	width: 400px;
	height: 80px;
	text-align: center;
	line-height: 80px;
	background-color: skyblue;
	color: white;
	font-size: 25px;
	border-radius: 8px;
	border:1px solid #ccc;
	margin:50px auto;
}
</style>
