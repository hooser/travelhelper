﻿
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
		$deletedata="delete from photo where id = $id";
		$statement=$db->query('select * from photo');
        if($statement==false)
		{
			echo "读取数据失败！";
		}
		
        while($photo1=mysqli_fetch_object($statement))
		{
			if($photo1->id==$id) 
			{
				$flag = 1;
				if($photo1->name!=$name)
				{
				    echo "<script>alert('照片名称与id不一致！'); </script>";
					if($isadmin == 1)
					    echo "<script>window.location.href='photo_manage.php';</script>";
				    else 
					    echo "<script>window.location.href='user_photo_manage.php';</script>";
				    $flag=0;
				    break;
				}
				else 
				{
					if($photo1->kind!=$kind)
				    {
				        echo "<script>alert('照片类型与id不一致！'); </script>";
						if($isadmin == 1)
					    echo "<script>window.location.href='photo_manage.php';</script>";
				    else 
					    echo "<script>window.location.href='user_photo_manage.php';</script>";
				        $flag=0;
				        break;
				    }
					else 
					{
						if($photo1->u_id!=$userid && $isadmin == 0)
						{
				            echo "<script>alert('您不具备删除该照片的权限！');window.location.href='user_photo_manage.php'; </script>";
				            $flag=0;
				            break;
				        }
				
					}
				}
			}
		}
        if($flag==0)
		{
			echo "<script>alert('删除失败!');</script>";
			if($isadmin == 1)
				echo "<script>window.location.href='photo_manage.php';</script>";
			else 
				echo "<script>window.location.href='user_photo_manage.php';</script>";
		}
        else
		{
			#$filepath='../photo/'."$name".$kind;  iconv("UTF-8", "gbk",$_FILES["file"]["name"]
			$filepath='../photo/'.iconv("UTF-8", "gbk",$name).$kind;
            if (unlink($filepath)==false)
            {
                echo "<script>alert('删除失败!');</script>";
				if($isadmin == 1)
					echo "<script>window.location.href='photo_manage.php';</script>";
				else 
					echo "<script>window.location.href='user_photo_manage.php';</script>";
            }
            else
            {
                if($db->query($deletedata)==true)
				{  
                    echo "<script>alert('删除成功!');</script>";  
					if($isadmin == 1)
					    echo "<script>window.location.href='photo_manage.php';</script>";
				    else 
					    echo "<script>window.location.href='user_photo_manage.php';</script>";
				    mysqli_free_result($statement);
                }
			    else
				{  
			         echo "<script>alert('图片删除，数据库信息没有清除！!');</script>"; 
					 if($isadmin == 1)
					    echo "<script>window.location.href='photo_manage.php';</script>";
				    else 
					    echo "<script>window.location.href='user_photo_manage.php';</script>";
                     #echo "Error insert data: " . $db->error;  
                }  
            }			
			
        }
		    
		mysqli_close($db);
        ?>
 
 
</body>
</html>
