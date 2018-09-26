<?php include 'head1.php'; ?>
	<form class="sui-form form-horizontal sui-validate" style="margin-left: 185px;margin-top: 40px;" action="register-save.php" method="post">
  <div class="control-group">
    <label for="email" class="control-label">用户邮件：</label>
    <div class="controls">
      <input type="text" id="email" name="email" placeholder="请输入邮箱" data-rules="required|email">
      <span id="tips"></span>
    </div>
  </div>
  <div class="control-group">
    <label for="userm" class="control-label">用户名：</label>
    <div class="controls">
      <input type="text" id="userm" placeholder="请输入用户名" data-rules="required" name="userm">
    </div>
  </div>
  <div class="control-group">
    <label for="password" class="control-label">密码：</label>
    <div class="controls">
      <input type="password" id="password" placeholder="请输入密码 " class="input-fat input-large" placeholder="密码" name="password" data-rules="required|minlength=2|maxlength=12">
    </div>
  </div>

  <div class="control-group">
    <label for="word" class="control-label">重复密码：</label>
    <div class="controls">
      <input type="password" id="word" placeholder="请输入重复密码 " class="input-fat input-large" name="word" data-rules="required|minlength=2|maxlength=12">
    </div>
  </div>
  <div class="control-group">
    <label for="yanzheng" class="control-label">验证码：</label>
    <div class="controls">
      	<input type="text" id="yanzheng" placeholder="请输入验证码" data-rules="required" class="input-medium" name="yanzheng">
    </div>
    <div style="width: 50px; height:22px;text-align: center;line-height: 22px;border:1px solid #ccc;margin-left: 10px;">
    	<?php
        function GetfourStr($len)
        {
          $chars_array = array(
            "0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
            "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",
            "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",
            "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",
            "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
            "S", "T", "U", "V", "W", "X", "Y", "Z",
          );
          $charsLen = count($chars_array) - 1;

          $outputstr = "";
          for ($i=0; $i<$len; $i++)
          {
            $outputstr .= $chars_array[mt_rand(0, $charsLen)];
          }
          return $outputstr;
        }
        echo GetfourStr(4);
      ?>
	</div>
  </div>
  <div class="control-group">
    <label for="questions" class="control-label">密码提示问题：</label>
    <div class="controls">
      <select id="question" name="question">
            <option value="你的小学在哪上学">你的小学在哪上学</option>
            <option value="你的最好朋友的姓名">你的最好朋友的姓名</option>
            <option value="你最有纪念意义的日期">你最有纪念意义的日期</option>
      </select>
    </div>
  </div>
  <div class="control-group">
    <label for="answer" class="control-label">密码答案：</label>
    <div class="controls">
      <input type="text" id="answer" placeholder="请输入密码提示答案" data-rules="required" name="answer">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label"></label>
    <div class="controls">
      <button type="submit" id="btns"  class="sui-btn btn-primary">立即注册</button>
    </div>
  </div>
</form>
<?php include 'foot1.php'; ?>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
  var email = document.getElementById('email');
  $("input[name=email]").on("blur",function(){
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
            $("#tips").html("此邮箱可以注册");

          }else{
            $("#tips").html("邮箱名称重复");
          }
        }
        if(xhr.status == "404"){
          console.log("网页已被外星人劫持！");
        }
      }
    }

    xhr.open("get","conn1.php?email="+encodeURIComponent(email.value),true);

    xhr.send(null);
  })
/*
  $("#btns").on("click",function(){

    if(window.XMLHttpRequest){
        var xhr = new XMLHttpRequest();
      }else{
        //兼容IE老版本
        var xhr = new ActiveObject("Msxml2.XMLHTTP");
     }
     console.log(xhr);
    xhr.onreadystatechange = function(){

      if(xhr.readyState == 3){
        console.log("正在处理中，请稍后....");
      }
      if(xhr.readyState == 4){
        console.log(xhr.responseText);
        if(xhr.status == "200"){
          console.log("请求完成，准备好了");

          if(xhr.responseText=="oK"){
            alert("注册成功");
            window.location.href="login.php";

          }else{
            alert("注册失败");
            window.location.href="register.php";
          }
        }
        if(xhr.status == "404"){
          console.log("网页已被外星人劫持！");
        }
      }

    }


    xhr.open("post","register-save-ajax.php",true);
    xhr.setRequestHeader("Content-Type"," application/x-www-form-urlencoded");
    xhr.send("email="+encodeURIComponent(email.value));
  })*/
</script>