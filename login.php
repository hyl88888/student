<?php include 'head1.php'; ?>
<form class="forms sui-form form-horizontal sui-validate" style="margin-left: 185px;margin-top: 40px;" action="login-save.php" method="post" id="form1">
  <div class="control-group">
    <label for="email" class="control-label">用户邮件：</label>
    <div class="controls">
      <input type="text" id="email" name="email" placeholder="请输入邮箱" data-rules="required|email">
      <span id="tips"></span>
    </div>
  </div>
  <div class="control-group">
    <label for="password" class="control-label">密码：</label>
    <div class="controls">
      <input type="password" id="password" name="password" placeholder="请输入密码" data-rules="required" title="密码">
    </div>
  </div>
  <div class="control-group">
    <label for="inputGender" class="control-label">验证码：</label>
    <div class="controls">
      	<input type="text" id="yanzheng" placeholder="请输入验证码" data-rules="required" class="input-medium" name="yanzheng">
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
    <label class="control-label"></label>
    <div class="controls">
      <button type="submit" class="sui-btn btn-primary">登录</button>
    </div>
  </div>
  <div class="control-group">
   	<a href="forget.php" style="margin-left: 100px;">忘记密码？</a>
  </div>
</form>
<div class='tishi'>登录成功</div>
<div class="emailError">邮箱填写错误</div>
<div class="passError">密码填写错误</div>
<?php include 'foot1.php'; ?>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
/* var Emails = document.getElementById('Emails');
  $("input[name=Emails]").on("blur",function(){
    //1.为了实现异步请求，先要实例化一个XMLHttpRequest对象
    if(window.XMLHttpRequest){
      var xhr = new XMLHttpRequest();
    }else{
      //兼容IE老版本
      var xhr = new ActiveObject("Msxml2.XMLHTTP");
    }

    xhr.onreadystatechange = function(){
      if(xhr.readyState == 3){
        console.log("正在处理中，请稍后....");
      }
      if(xhr.readyState == 4){
        if(xhr.status == "200"){
          console.log("请求完成，准备好了");
          console.log(xhr.responseText);
          if(xhr.responseText == "oK"){
            $("#tips").html("请注册邮箱");
          }else{
            $("#tips").html("邮箱已注册");
          }
        }
        if(xhr.status == "404"){
          console.log("网页已被外星人劫持！");
        }
      }
    }

    xhr.open("get","conn1.php?Emails="+encodeURIComponent(Emails.value),true);

    xhr.send(null);
  })*/

  //给提交按钮绑定事件
  $("button[type=submit]").on('click',function(){
    //使用$.ajax()提交数据
    $.ajax({
      url : "login-save-ajax.php",
      type : "POST",
      data : $("#form1").serialize(),
      dataType : "json",
      success : function(data,textStatus){
        //请求成功后调用此函数
        console.log(data);
        if(data.code == 200){
          $('.tishi').slideDown(2000,function(){
            window.location.href="index.php";
          });

          /*$('.tishi').animate({"height":"80px","display":"block"},function(){
            window.location.href="index.php";
          })*/
        }
        if(data.code == 20001){
            //提示用户密码错误
            // alert("密码填写错误");
            var show1 = function (){$("div.passError").show();};
            var hide1 = function (){$("div.passError").hide();};
            setTimeout (show1,500);
            setTimeout (hide1,3000);
          }
          if(data.code == 20004){
            //提示用户邮箱错误
            // alert("邮箱填写错误");
            var show2 = function (){$("div.emailError").show();};
            var hide2 = function (){$("div.emailError").hide();};
            setTimeout (show2,500);
            setTimeout (hide2,3000);

          }
      },
      error : function(XMLHttpRequest,textStatus,errorThrown){
        //请求失败后调用此函数
        console.log("失败原因："+errorThrown);
      }
    })
    return false;
  })
</script>