
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>>旅有友</title>
    
</head>
<body>
 
        
        <?php
		$servername="localhost";  
        $username="root";  
        $userpassword="";  
		$dbname = "travel";
		$id1 = $_POST['perid'];
		$name1 = $_POST['pername']; 
		$flag = 1;
		#echo '$id1='.$id1;
		#echo '$name1='.$name1;
		#echo '$overview1='.$overview1;
        #$db = new PDO('mysql:host=localhost;dbname=travel','root','');
		$db = new mysqli($servername,$username,$userpassword,$dbname);
		$deletedata="delete from person where id = $id1";
		$deletephoto="delete from photo where u_id = $id1";
		$deletediary="delete from diary where u_id = $id1";
		$statement=$db->query('select * from person');
        if($statement==false)
		{
			echo "读取数据失败！";
		}
		
        while($person1=mysqli_fetch_object($statement))
		{
			if($person1->id==$id1)
			{
				$flag = 0;
				if($person1->name != "$name1")
				{
				    echo "<script>alert('地点名称与id不一致！'); </script>";
				    $flag=1;
				    break;
				}
			}
		}
        if($flag==1)
		{
			echo "<script>alert('删除失败!');window.location.href='person_del.html';</script>";
		}
        else{
            if($db->query($deletephoto)==true && $db->query($deletediary)==true&& $db->query($deletedata)==true){  
                echo "<script>alert('删除成功!');window.location.href='person_manage.html';</script>";  
				mysqli_free_result($statement);
            }
			else{  
                echo "Error insert data: " . $db->error;  
            }      
		    #echo "<script>alert('删除成功!');window.location.href='place_del.html';</script>";

            //echo "<a href=\"admin.php\">点击进入选择业务主页</a>";
        }
		mysqli_close($db);
        ?>
 
 
</body>
</html>
