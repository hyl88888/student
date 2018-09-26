<?php
session_start();
unset($_SESSION['name'] );//删除指定的session
header("Refresh:1;url=denglu.php")
?>