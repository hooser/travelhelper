﻿<?php
session_start();
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>>旅有友</title>
    
</head>
<body>
 
        
        <?php
        $username=$_POST['username'];
        $password=$_POST['password'];
        $db = new PDO('mysql:host=localhost;dbname=travel','root','');
        $statement=$db->prepare('select * from person where name=:username');
        $statement->execute([':username'=>$username]);
        $user=$statement->fetch();
        if(empty($user)){
           echo "<script>alert('用户不存在！请重新登录'); history.go(-1);</script>";
        }
		
        else if($password != $user['passwd']){
            echo "<script>alert('密码不正确！请重新登录'); history.go(-1);</script>";
        }
		else if(1 == $user['isadmin']){
            echo "<script>alert('请从管理员用户方式登录！'); history.go(-1);</script>";
        }
        else{
            $_SESSION['user']=$username;
			$_SESSION['id']=$user['id'];
			$_SESSION['isadmin']=0;
		    echo "<script>alert('登录成功!进入选择业务主页');window.location.href='user.php';</script>";

            //echo "<a href=\"admin.php\">点击进入选择业务主页</a>";
        }
        ?>
 
 
</body>
</html>
