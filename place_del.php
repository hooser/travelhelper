
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
		$id1 = $_POST['placeid'];
		$name1 = $_POST['placename']; 
		$flag = 1;
		#echo '$id1='.$id1;
		#echo '$name1='.$name1;
		#echo '$overview1='.$overview1;
        #$db = new PDO('mysql:host=localhost;dbname=travel','root','');
		$db = new mysqli($servername,$username,$userpassword,$dbname);
		$deletedata="delete from place where id = $id1";
		$deletemark="delete from mark where p_id = $id1";
		$deletemakemark="delete from makemark where p_id = $id1";
		$deletephoto="delete from photo where p_id = $id1";
		$deletediary="delete from diary where p_id = $id1";
		$statement=$db->query('select * from place');
        if($statement==false)
		{
			echo "读取数据失败！";
		}
		
        while($place1=mysqli_fetch_object($statement))
		{
			if($place1->id==$id1)
			{
				$flag = 0;
				if($place1->name != "$name1")
				{
				    echo "<script>alert('地点名称与id不一致！'); </script>";
				    $flag=1;
				    break;
				}
			}
		}
        if($flag==1)
		{
			echo "<script>alert('删除失败!');window.location.href='place_del.html';</script>";
		}
        else{
            if($db->query($deletemark)==true && $db->query($deletephoto)==true && $db->query($deletediary)==true && $db->query($deletedata)==true && $db->query($deletemakemark)==true){  
                echo "<script>alert('删除成功!');window.location.href='place_del.html';</script>";  
				mysqli_free_result($statement);
            }
			else{  
                echo "Error delete data: " . $db->error;  
            }      
		    #echo "<script>alert('删除成功!');window.location.href='place_del.html';</script>";

            //echo "<a href=\"admin.php\">点击进入选择业务主页</a>";
        }
		mysqli_close($db);
        ?>
 
 
</body>
</html>
