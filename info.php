<?php
session_start();

if(empty($_SESSION['user'])){
      echo "<script>alert('重新登陆!'); history.go(-1);</script>";
	
}
else {
    echo $_SESSION['user'];
}