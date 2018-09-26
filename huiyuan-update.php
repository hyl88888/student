<?php include("head.php"); ?>
<?php
$kid = empty($_REQUEST["kid"])?"null":$_REQUEST["kid"];
if ($kid == "null") {
	die ("请选择要修改的记录");
}else{
include ('conn.php');

//执行SQL语句
$sql = "select id,email,name,password,question,answer from user where id='{$kid}'";
$result = mysqli_query($conn,$sql);

// 输出数据
if (mysqli_num_rows($result) > 0){
	//将查找到
	$row = mysqli_fetch_assoc($result);
}else{
	echo "找不到该记录";
}

//关闭数据库
mysqli_close($conn);
}
?>
<div class="sui-layout" style="height: 550px">
	<div class="sidebar" style="height:100%;border-right:1px solid #41719c;">
		<!-- 左菜单 -->
		<?php include("leftmenu.php"); ?>
	</div>
	<div class="content">
		<p class="sui-text-xxlarge my-padd label-success">会员管理</p>
		<form id="form1" action="huiyuan-save.php" method="post" class="sui-form form-horizontal sui-validate">
			<div class="control-group">
    			<label class="control-label" for="inputEmail">用户邮件：</label>
   				 <div class="controls">
   					<!-- 增加一个input，用来区分是新增加的数据还是修改数据 -->
					<input type="hidden" name="action" value="update">
					<!-- 增加一个隐藏的input，保存id -->
					<input type="hidden" name="kid" value="<?php echo $row['id'] ?>">
     				<input id="user" name="user" class="input-large input-fat" type="text" placeholder="请输入用户邮件" data-rules="required" value="<?php echo $row['email']; ?>">
     				<span>用户邮件不能重复</span>
   				 </div>
 			</div>
 			<div class="control-group">
    			<label class="control-label" for="inputEmail">用户名：</label>
   				<div class="controls">
     				<input id="username" name="username" class="input-large input-fat" type="text" placeholder="请输入用户名" value="<?php echo $row['name']; ?>">
   				 </div>
 			</div>
 			<div class="control-group">
    			<label class="control-label" for="inputEmail">密码：</label>
   				<div class="controls">
     				<input id="password" name="password" class="input-large input-fat" type="text" placeholder="请输入密码" value="<?php echo $row['password']; ?>">
   				 </div>
 			</div>
 			<div class="control-group">
    			<label class="control-label" for="inputEmail">重复密码：</label>
   				<div class="controls">
     				<input id="congmima" name="congmima" class="input-large input-fat" type="text" placeholder="请输入密码">
   				 </div>
 			</div>
 			<div class="control-group">
    			<label class="control-label" for="inputEmail">验证码：</label>
   				 <div class="controls">
     				<input id="yzma" name="yzma" class="input-mediuml input-fat" type="text" placeholder="请输入验证码">

   				 </div>
           <div style="width: 50px; height:22px;text-align: center;line-height: 22px;border:1px solid #ccc;margin-left: 10px;">
      <?php
        function GetfourStr($len){
          $arr = array(
            "0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
            "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",
            "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",
            "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",
            "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
            "S", "T", "U", "V", "W", "X", "Y", "Z",
          );
          // count() 函数返回数组中元素的数目
          $charsLen = count($arr) - 1;

          $str = "";
          for ($i=0; $i<$len; $i++){
            /*如果没有提供可选参数 min 和 max，mt_rand() 返回 0 到 RAND_MAX 之间的伪随机数。例如想要 5 到 15（包括 5 和 15）之间的随机数，用 mt_rand(5, 15)。

很多老的 libc 的随机数发生器具有一些不确定和未知的特性而且很慢。PHP 的 rand() 函数默认使用 libc 随机数发生器。mt_rand() 函数是非正式用来替换它的。该函数用了 Mersenne Twister 中已知的特性作为随机数发生器，它可以产生随机数值的平均速度比 libc 提供的 rand() 快四倍。*/
  // mt_rand() 使用 Mersenne Twister 算法返回随机整数。
            $str .= $arr[mt_rand(0, $charsLen)];
          }
          return $str;
        }
        echo GetfourStr(4);
      ?>
  </div>
 			</div>
 			<div class="control-group">
    			<label class="control-label" for="inputEmail">密码提示问题：</label>
   				 <div class="controls">
     				<select id="issue" name="issue" value="<?php echo $row['question']; ?>">
     					<option>你的家住在哪里？</option>
     					<option>你的小学老师叫什么？</option>
     					<option>你的母亲叫什么？</option>
     					<option>你的父亲叫什么？</option>
     					<option>你最喜欢吃的东西是什么？</option>
     					<option>你最喜欢的人是谁？</option>
           			</select>
   				 </div>
 			</div>
 			<div class="control-group">
    			<label class="control-label" for="inputEmail">密码答案：</label>
   				 <div class="controls">
     				 <input id="answer" name="answer" class="input-large input-fat" type="text" placeholder="请输入密码答案" value="<?php echo $row['answer']; ?>">
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
<?php include "foot.php"; ?>