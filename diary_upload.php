
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
        $username="root";  
        $userpassword="";  
		$dbname = "travel";
		$id = $_POST['photoid'];
		$name = $_POST['photoname']; 
		$placeid = $_POST['placeid'];
		$kind = $_POST['kind'];
		$userid = $_SESSION['id'];
		$isadmin = $_SESSION['isadmin'];
		#$p_id = $_POST['kind'];
		$flag = 0;
		$db = new mysqli($servername,$username,$userpassword,$dbname);
		$insertdata="insert into diary(id,name,kind,p_id,u_id) values($id,\"$name\",\"$kind\",$placeid,$userid)";
		$statement=$db->query('select * from diary');
        if($statement==false)
		{
			echo "读取数据失败！";
		}
		
        while($photo1=mysqli_fetch_object($statement))
		{
			if($photo1->id==$id || $photo1->name==$name)
			{
				echo "<script>alert('文件名称或者id已经使用！'); </script>";
				if($isadmin == 1)
					echo "<script>window.location.href='diary_manage.php';</script>";
				else 
					echo "<script>window.location.href='user_diary_manage.php';</script>";
				$flag=1;
				break;
			}
		}
        if($flag==1)
		{
			echo "<script>alert('添加失败!');</script>";
			if($isadmin == 1)
				echo "<script>window.location.href='diary_manage.php';</script>";
			else 
				echo "<script>window.location.href='user_diary_manage.php';</script>";
		}
        else{
				
				#存储上传照片至../photo
		

        if ($_FILES["file"]["error"] > 0)
        {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
        }
        else
        {
           
            if (file_exists("../diary" . $_FILES["file"]["name"]))
            {
                echo $_FILES["file"]["name"] . " already exists. ";
            }
            else
            {
                
	            move_uploaded_file($_FILES["file"]["tmp_name"],
                "../diary/" . iconv("UTF-8", "gbk",$_FILES["file"]["name"])); 
	            if($db->query($insertdata)==true)
				{  
                    echo "<script>alert('添加成功!');</script>";
					if($isadmin == 1)
					    echo "<script>window.location.href='diary_manage.php';</script>";
				    else 
					    echo "<script>window.location.href='user_diary_manage.php';</script>";
				    mysqli_free_result($statement);
                }
            }
        }
		}
	
        #end	
		    #echo "<script>alert('添加成功!');window.location.href='photo_manage.php';</script>";

            //echo "<a href=\"admin.php\">点击进入选择业务主页</a>";
		mysqli_close($db);
        ?>
 
 
</body>
</html>
