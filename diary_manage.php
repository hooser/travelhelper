<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>旅有友</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link   rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin.php">旅有友</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">   <a href="logout.php" class="btn btn-danger square-btn-adjust">退出</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
			   </li>
				
					
                    <li>
                        <a href="admin.php"><i class="fa fa-dashboard fa-3x"></i>主页</a>
                    </li>
                     <li>
					    <!--<a  href="select_action.php"><i class="fa fa-desktop fa-3x"></i> 查询</a>-->
                        <a  href="place_manage.html"><i class="fa fa-desktop fa-3x"></i> 地点</a>
                    </li>
                    <li>
                        <!--<a  href="make_card.php"><i class="fa fa-qrcode fa-3x"></i> 用户</a>-->
						<a  href="person_manage.html"><i class="fa fa-qrcode fa-3x"></i> 用户</a>
                    </li>
					<li  >
                        <!--<a   href="delete_card.php"><i class="fa fa-bar-chart-o fa-3x"></i>注销</a>-->
						<a   href="photo_manage.php"><i class="fa fa-bar-chart-o fa-3x"></i>图片</a>
                    </li>	
                      <li  >
                        <!--<a  href="add_book.php"><i class="fa fa-table fa-3x"></i>添书</a>-->
						<a  class="active-menu" href="diary_manage.php"><i class="fa fa-table fa-3x"></i>游记</a>
                    </li>
					
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>管理员后台</h2>   
                        <h5><?php include 'info.php'?> 欢迎登陆 </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-envelope-o"></i>
                </span>
				
				<!-- a new part start -->
		    <form action="diary_upload.php" method="post" enctype="multipart/form-data">
			
			    <input name="photoid" type="text" value="diaryid" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'diaryid';}">
				<br />
				<br />
			    <input name="photoname" type="text" value="diaryname" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'diaryname';}">
				<br />
				<br />
				<input name="placeid" type="text" value="placeid (游记地点的id)" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'placeid';}">
				<br />
				<br />
	            <input name="kind" type="text" value="扩展名" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '扩展名';}">
				<br />
				<br />
	            <input type="file" name="file" >
				<br />
				<br />
                <input name="upload" type="submit" value="上传" />
				<br />
				
		    </form>
		     
				<!-- a new part end -->
				
				<!--<button type="submit" onclick="location.href='place_add.html'">增加</button>-->
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                <form action="diary_delete.php" method="post">
			    <input name="diaryid" type="text" value="diaryid" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'diaryid';}">
				<br />
				<br />
			    <input name="diaryname" type="text" value="diaryname" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'diaryname';}">
				<br />
				<br />
	            <input name="kind" type="text" value="扩展名" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '扩展名';}">
				<br />
				<br />
	            <br />
				<br />
				
				<br />
				
                <input name="delete" type="submit" value="删除" />
				<br />
				<br />
		    </form>
             </div>
			 
		     </div>
                
			<div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                <i class="fa fa-bell "></i>
                </span>
                <!-- new part start -->
				<form action="test_diary.php" method="post">
			    <input name="photoid" type="text" value="diaryid" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'diaryid';}">
				<br />
				<br />
			    <input name="photoname" type="text" value="diaryname" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'diaryname';}">
				<br />
				<br />
	            <input name="kind" type="text" value="扩展名" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '扩展名';}">
				<br />
				<br />
	            <br />
				<br />
				<br />
				
                <input name="show" type="submit" value="查看" />
				<br />
				<br />
		    </form>
				<!-- new part end -->
             </div>
			 
		     </div>	
			 <br />
			 <br />
			 <br />
			 <br />
			 <br />
			 <br />
			 <br />
			 <div class="col-md-30 col-sm-10 col-xs-10">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-#E6E6FA set-icon">
                    <i class="fa fa-beer"></i>
                </span>
                <div class="text-box" >
                      <?php
					   $result=null;
					   $db = new PDO('mysql:host=localhost;dbname=travel','root','');
			           $result=$db->query("select * from diary");
			   if($result)
			   {
			        
				    $recordnum=$result->fetchAll(PDO::FETCH_ASSOC);
                    echo '<p style="color:red"; class="main-text">'.count($recordnum).'篇</p>';
					for($i=0;$i<count($recordnum);$i++)
					{
					    echo '<span class="main-text">'."id:".$recordnum[$i]['id']."&nbsp"."&nbsp".$recordnum[$i]['name'].$recordnum[$i]['kind']."</span>"."&nbsp"."&nbsp"."&nbsp"."&nbsp";
					}
			   }
               else 
				   echo '<p style="color:red";class="main-text">0篇</p>';
                         ?>                
				<p class="text-muted">游记</p>
                </div>
             </div>
		     </div>
			 
			 
		     </div>
			</div>
	        
	      
			
                </div>
             </div>
			 
                 <!-- /. ROW  -->
         
                  
                 <!-- /. ROW  -->
            
    
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
 