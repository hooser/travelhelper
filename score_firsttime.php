
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
		$score = $_POST['score'];
		$flag = 0;
		$username = $_SESSION['user'];
		$userid = $_SESSION['id'];
		$db = new mysqli($servername,$dbuser,$userpassword,$dbname);
		$pre_getnum = "select grade,num from mark where p_id = $id1";
		$getinfo = $db->query($pre_getnum);
		if($getinfo==false)
		{
			echo "读取info失败！";
		}
		$tempinfo = mysqli_fetch_object($getinfo);
		$num = $tempinfo->num;
		$grade = $tempinfo->grade;
		
		#$insertdata="insert into mark(p_name,p_id,grade,num) values(\"$name1\",$id1,,\"$overview1\")";
		#$insertmakemark="insert into makemark(u_id,u_name,p_id,p_name,score) values($userid,\"$username\",$id1,$name1,$score)";
		#$statement=$db->query('select * from place');
		$abletomark = "select * from makemark where u_id = $userid and p_id = $id1";
		#echo "$userid=".$userid;
		$getabletomark = $db->query($abletomark);
		if($getabletomark==false)
		{
			echo "读取getabletomark失败！";
		}
		
		$firstuser = 0;
        while($isable=mysqli_fetch_object($getabletomark))
		{
			$firstuser = 1;
			$flag = 1;
			if($isable->p_id = $id1)
			{
				echo "<script>alert('您已经评价过！');window.location.href='score_manage.php'; </script>";
				$flag=0;
				break;
			}
		}
		
		if ($firstuser==0)
			$flag = 1;
        if($flag==0)
		{
			echo "<script>alert('评分失败!');window.location.href='score_manage.php';</script>";
			
		}
        else{
			$num = $num + 1;
			$grade = $grade + $score;
			echo $num;
			echo $grade;
			$newcore = $grade / $num;
			#$insert_makemark = "insert into makemark(u_id,u_name,p_id,p_name,score) values ($userid,$username,$id1,$name1,$score)";
			#$res2 = $db->query($insert_makemark);
			$update_mark = "UPDATE mark SET grade = $grade, num=$num WHERE p_id = $id1";
			#$insert_makemark = "insert into makemark(u_id,u_name,p_id,p_name,score) values ($userid,$username,$id1,$name1,$score)";
			$update_place = "UPDATE place SET core = $newcore WHERE id = $id1";
            $res1 = $db->query($update_mark);
			$insertmakemark="insert into makemark(u_id,u_name,p_id,p_name,score) values($userid,\"$username\",$id1,\"$name1\",$score)";
		    $db->query($insertmakemark);
			$res3 = $db->query($update_place);
		    mysqli_free_result($getinfo);
			mysqli_free_result($getabletomark);
			echo "<script>alert('评分成功!');window.location.href='score_manage.php';</script>";
			#window.location.href='score_manage.php';
        }
		mysqli_close($db);
        ?>
 
 
</body>
</html>
