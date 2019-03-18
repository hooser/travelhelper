
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
		$overview1 = $_POST['overview'];
		$flag = 0;
		$db = new mysqli($servername,$username,$userpassword,$dbname);
		$insertdata="insert into place(id,name,core,overview) values($id1,\"$name1\",0,\"$overview1\")";
		$insertmark="insert into mark(p_name,p_id,grade,num) values(\"$name1\",$id1,0,0)";
		$statement=$db->query('select * from place');
        if($statement==false)
		{
			echo "读取数据失败！";
		}
		
        while($place1=mysqli_fetch_object($statement))
		{
			if($place1->id==$id1 || $place1->name==$name1)
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
            if($db->query($insertdata)==true )
			{  
		        if($db->query($insertmark)==true)
				{
					echo "<script>alert('添加成功!');window.location.href='place_add.html';</script>";
					mysqli_free_result($statement);
				}
                #echo "插入数据成功"; 
                else
				{				
				    echo "Error1 insert data: " . $db->error; 
                }
			}
			else
			{  
                echo "Error2 insert data: " . $db->error;  
            }      
			

            //echo "<a href=\"admin.php\">点击进入选择业务主页</a>";
        }
		mysqli_close($db);
        ?>
 
 
</body>
</html>
