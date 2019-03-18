
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
		$id = $_POST['perid'];
		$name = $_POST['pername']; 
		$passwd = $_POST['perpasswd'];
		$isadmin = $_POST['isadmin'];
		$flag = 0;
		#echo '$id1='.$id1;
		#echo '$name1='.$name1;
		#echo '$overview1='.$overview1;
        #$db = new PDO('mysql:host=localhost;dbname=travel','root','');
		$db = new mysqli($servername,$username,$userpassword,$dbname);
		$insertdata="insert into person(id,name,passwd,isadmin) values($id,\"$name\",\"$passwd\",$isadmin)";
		$statement=$db->query('select * from person');
        if($statement==false)
		{
			echo "读取数据失败！";
		}
		
        while($person1=mysqli_fetch_object($statement))
		{
			if($person1->id==$id || $person1->name==$name)
			{
				echo "<script>alert('地点名称或者id已经使用！'); </script>";
				$flag=1;
				break;
			}
		}
        if($flag==1)
		{
			echo "<script>alert('添加失败!');window.location.href='place_add.html';</script>";
		}
        else{
            if($db->query($insertdata)==true){  
                #echo "插入数据成功";  
				mysqli_free_result($statement);
            }
			else{  
                echo "Error insert data: " . $db->error;  
            }      
		    echo "<script>alert('添加成功!');window.location.href='person_manage.html';</script>";

            //echo "<a href=\"admin.php\">点击进入选择业务主页</a>";
        }
		mysqli_close($db);
        ?>
 
 
</body>
</html>
