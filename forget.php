<?php include 'head1.php'; ?>
<form class="sui-form form-horizontal sui-validate" style="margin-left: 185px;margin-top: 40px;" action="index.php" method="post">
  <div class="control-group">
    <label for="Emails" class="control-label">用户邮件：</label>
    <div class="controls">
      <input type="text" id="Emails" name="Emails" placeholder="请输入邮箱" data-rules="required|email">
      <span id="tips"></span>
    </div>
  </div>
  <div class="control-group">
    <label for="inputGender" class="control-label">验证码：</label>
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
    <label for="question" class="control-label">密码提示问题：</label>
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
      <button type="submit" class="sui-btn btn-primary">提交</button>
    </div>
  </div>
</form>
<?php include 'foot1.php'; ?>