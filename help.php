<!DOCTYPE html>
 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>XIN知图书</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
   
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
    
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>

<body>
<?php
    header("Content-Type:text/html;charset=utf-8"); 
if(isset($_POST['search']))	
{
	$wen=trim($_POST['placename']);
	if($wen=='')
	{
			echo "<script>alert('请输入搜索内容！'); history.go(-1);</script>";
    exit;
	}
	
        $servername="localhost";  
        $dbuser="root";  
        $userpassword="";  
		$dbname = "travel";
		$name = $_POST['placename']; 
		
		$db = new mysqli($servername,$dbuser,$userpassword,$dbname);
		$pre_getplace = "select * from place where name = \"$name\"";
		
		$getplace = $db->query($pre_getplace);
		if($getplace==false)
		{
			 printf("Error: %s\n", mysqli_error($db));
             exit();
		}
		while($tempplace = mysqli_fetch_object($getplace))
		{
		    $id = $tempplace -> id;
		    $core = $tempplace->core;
            $overview = $tempplace->overview;
		}
}


 
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
         <div class="panel panel-default">
                        <div class="panel-heading">
                            检索结果
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                   
                    <th>地点</th>
                    <th>评分</th>
                    <th>简介</th>
					
                                           
										</tr>
                                    </thead>
                                    <tbody>
									
                                     <?php
                
					 echo '<tr>';
                     echo "<td>".$id."</td>";
					echo "<td>".$name."</td>";
                    echo "<td>".$core."</td>";
                    echo "<td>".$overview."</td>";
                   
				
                ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                
		</div>
    </div>
</div>

<nav aria-label="...">
    <ul class="pagination">
        <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
        <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
        <li ><a href="#">2 <span class="sr-only">(current)</span></a></li>
        <li><a href="#">3 <span class="sr-only">(current)</span></a></li>
    </ul>
</nav>


<div class="container-fluid">

    <div class="btn-group" role="group" aria-label="...">
        <div class="col-md-12"></div> <a href="home.html"> <button type="button" class="btn btn-default">返回主页</button></a></div>
</div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>

</body>
</html>
