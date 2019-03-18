
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>>旅有友</title>
    
</head>
<body>
        
        <?php
		session_start();
		$servername="localhost";  
        $dbuser="root";  
        $userpassword="";  
		$dbname = "travel";
		$id1 = $_POST['placeid'];
		$name1 = $_POST['placename']; 
		#$score = $_POST['score'];
		$flag = 0;
		$username = $_SESSION['user'];
		$userid = $_SESSION['id'];
		$db = new mysqli($servername,$dbuser,$userpassword,$dbname);
		$pre_getscore = "select score from makemark where u_id = $userid and p_id = $id1";
		$getscore = $db->query($pre_getscore);
		$tempscore = mysqli_fetch_object($getscore);
		$deletable = 1;
		if($tempscore==false)
		{
			$deletable = 0;
			echo "<script>alert('您尚未评分!');window.location.href='score_manage.php';</script>";
		}
		if($deletable == 1)
		{
		$score = $tempscore->score;
		$pre_getinfo = "select grade,num from mark where p_id = $id1";
		$getinfo = $db->query($pre_getinfo);
		if($getinfo==false)
		{
			echo "读取info失败！";
		}
		$tempinfo = mysqli_fetch_object($getinfo);
		$num = $tempinfo->num;
		$grade = $tempinfo->grade;
		$num = $num - 1;
		$grade = $grade - $score;
        if($num == 0)
			$newcore = 0;
		else 
		    $newcore = $grade/$num;
		$deletemakemark="delete from makemark where u_id = $userid and p_id = $id1" ;
		$update_mark = "UPDATE mark SET grade = $grade, num=$num WHERE p_id = $id1";
		$update_place = "UPDATE place SET core = $newcore WHERE id = $id1";
        if($db->query($update_mark)==true && $db->query($update_place)==true &&$db->query($deletemakemark)==true){  
                #echo "插入数据成功";  
				mysqli_free_result($getscore);
				mysqli_free_result($getinfo);
				echo "<script>alert('删除成功!');window.location.href='score_manage.php';</script>";
            }
			else{  
                echo "Error : " . $db->error;  
            }      
		}
		    #echo "<script>alert('评价成功!');window.location.href='score_manage.php';</script>";

            //echo "<a href=\"admin.php\">点击进入选择业务主页</a>";
		mysqli_close($db);
        ?>
 
 
</body>
</html>
