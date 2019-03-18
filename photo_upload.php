
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
		#echo '$id1='.$id1;
		#echo '$name1='.$name1;
		#echo '$overview1='.$overview1;
        #$db = new PDO('mysql:host=localhost;dbname=travel','root','');
		$db = new mysqli($servername,$username,$userpassword,$dbname);
		$insertphoto="insert into photo(id,name,kind,p_id,u_id) values($id,\"$name\",\"$kind\",$placeid,$userid)";  
		#$insertdata="insert into diary(id,name,kind,p_id,u_id) values($id,\"$name\",\"$kind\",$placeid,1)";
		$statement=$db->query('select * from photo');
        if($statement==false)
		{
			echo "读取数据失败！";
		}
		
        while($photo1=mysqli_fetch_object($statement))
		{
			if($photo1->id==$id || $photo1->name==$name)
			{
				echo "<script>alert('照片名称或者id已经使用！');</script>";
				if($isadmin == 1)
					echo "<script>window.location.href='photo_manage.php';</script>";
				else 
					echo "<script>window.location.href='user_photo_manage.php';</script>";
				$flag=1;
				break;
			}
		}
        if($flag==1)
		{
			echo "<script>alert('添加失败!');</script>";
			if($isadmin == 1)
				echo "<script>window.location.href='photo_manage.php';</script>";
			else 
				echo "<script>window.location.href='user_photo_manage.php';</script>";
		}
        else{
				
				#存储上传照片至../photo
		
		if (($_FILES["file"]["type"] == "image/gif")
             || ($_FILES["file"]["type"] == "image/jpeg")
             || ($_FILES["file"]["type"] == "image/jpg")
             || ($_FILES["file"]["type"] == "image/pjpeg")
             || ($_FILES["file"]["type"] == "image/png"))
    {
        if ($_FILES["file"]["error"] > 0)
        {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
        }
        else
        {
            #echo "Upload: " . $_FILES["file"]["name"] . "<br />";
            #echo "Type: " . $_FILES["file"]["type"] . "<br />";
            #echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
            #echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

            if (file_exists("../photo" . $_FILES["file"]["name"]))
            {
                echo $_FILES["file"]["name"] . " already exists. ";
            }
            else
            {
                #move_uploaded_file($_FILES["file"]["tmp_name"],
                #"../photo/" . $_FILES["file"]["name"]);   './upload/'.iconv("UTF-8", "gbk",$name)
     
	            move_uploaded_file($_FILES["file"]["tmp_name"],
                "../photo/" . iconv("UTF-8", "gbk",$_FILES["file"]["name"])); 
	            if($db->query($insertphoto)==true)
				{  
                    echo "<script>alert('添加成功!');</script>";
				    mysqli_free_result($statement);
					if($isadmin == 1)
					    echo "<script>window.location.href='photo_manage.php';</script>";
				    else 
					    echo "<script>window.location.href='user_photo_manage.php';</script>";
                }
            }
        }
    }    
	else
    {
        echo "<script>alert('添加失败!');</script>";
		if($isadmin == 1)
			echo "<script>window.location.href='photo_manage.php';</script>";
		else 
			echo "<script>window.location.href='user_photo_manage.php';</script>";
	}
	
        #end	
    }
		    #echo "<script>alert('添加成功!');window.location.href='photo_manage.php';</script>";

            //echo "<a href=\"admin.php\">点击进入选择业务主页</a>";
		mysqli_close($db);
        ?>
 
 
</body>
</html>
