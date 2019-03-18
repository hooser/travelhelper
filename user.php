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
                <a class="navbar-brand" href="user.php">用户</a> 
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
                        <a class="active-menu"  href="user.php"><i class="fa fa-dashboard fa-3x"></i>主页</a>
                    </li>
                     <li>
					    <!--<a  href="select_action.php"><i class="fa fa-desktop fa-3x"></i> 查询</a>-->
                        <a  href="score_manage.php"><i class="fa fa-desktop fa-3x"></i> 评分</a>
                    </li>
					<li  >
                        <!--<a   href="delete_card.php"><i class="fa fa-bar-chart-o fa-3x"></i>注销</a>-->
						<a   href="user_photo_manage.php"><i class="fa fa-bar-chart-o fa-3x"></i>图片</a>
                    </li>	
                      <li  >
                        <!--<a  href="add_book.php"><i class="fa fa-table fa-3x"></i>添书</a>-->
						<a  href="user_diary_manage.php"><i class="fa fa-table fa-3x"></i>游记</a>
                    </li>
					<li  >
                        <!--<a  href="add_book.php"><i class="fa fa-table fa-3x"></i>添书</a>-->
						<a  href="show_city.php"><i class="fa fa-table fa-3x"></i>入库城市</a>
                    </li>
					<!--
                    <li  >
                        <a  href="delete_book.php"><i class="fa fa-edit fa-3x"></i> 删书 </a>
                    </li>				
					 <li  >
                        <a   href="borrow_book.php"><i class="fa fa-bolt fa-3x"></i> 借书</a>
                    </li>	
                     <li  >
                        <a   href="return_book.php"><i class="fa fa-laptop fa-3x"></i>还书</a>
                    </li>-->	
					
		 

					  
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>用户后台</h2>   
                        <h5><?php include 'info.php'?> 欢迎登陆 </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                
				<?php
              
              $db = new PDO('mysql:host=localhost;dbname=travel','root','');
              $result=$db->query('select count(*) as num from person where isadmin=0');
			  
				?>
      
             
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                <div class="text-box" >
				
                     <?php
					   $result=null;
					   $userid = $_SESSION['id'];
			  $result=$db->query("select * from makemark where u_id = $userid");
			   if($result)
			   {
				    $marknum=$result->fetchAll(PDO::FETCH_ASSOC);
                    echo '<p style="color:red"; class="main-text">'.count($marknum).'个</p>';
		            echo "<br>";echo "<br>";echo "<br>";echo "<br>";
					for($i=0;$i<count($marknum);$i++)
					{
						if($i==0)
						{
						echo "&nbsp";echo "&nbsp";echo "&nbsp";echo "&nbsp";}
					    echo '<span class="main-text" style="font-size:18px;">'."id:".$marknum[$i]['p_id']."&nbsp"."&nbsp".$marknum[$i]['p_name']."&nbsp"."&nbsp".$marknum[$i]['score']."<br/>"."</span>"."&nbsp"."&nbsp"."&nbsp"."&nbsp";
					}
			   }
               else 
				   echo '<p style="color:red"; class="main-text">0个</p>';
                         ?>                
				<p class="text-muted">评分</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
                <div class="text-box" >
                      <?php
					   $result=null;
					   $userid = $_SESSION['id'];
			  $result=$db->query("select * from photo where u_id = $userid");
			   if($result)
			   {
				    $photonum=$result->fetchAll(PDO::FETCH_ASSOC);
                    echo '<p style="color:red"; class="main-text">'.count($photonum).'张</p>';
					echo "<br>";echo "<br>";echo "<br>";echo "<br>";
					for($i=0;$i<count($photonum);$i++)
					{
						if($i==0)
						{
						echo "&nbsp";echo "&nbsp";echo "&nbsp";echo "&nbsp";}
					    echo '<span class="main-text" style="font-size:18px;">'."id:".$photonum[$i]['id']."&nbsp"."&nbsp".$photonum[$i]['name'].$photonum[$i]['kind']."<br/>"."</span>"."&nbsp"."&nbsp"."&nbsp"."&nbsp";
					}
			   }
               else 
				   echo '<p class="main-text">0张</p>';
                         ?>                  
				<p class="text-muted">照片</p>
                </div>
             </div>
		     </div>
			 <!--new row-->
		
			 <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-envelope-o"></i>
                </span>
				 
                <div class="text-box" >
                     <?php
					   $result=null;
					   $userid = $_SESSION['id'];
			           $result=$db->query("select * from diary where u_id = $userid");
			   if($result)
			   {
				    $diarynum=$result->fetchAll(PDO::FETCH_ASSOC);
                    echo '<p style="color:red"; class="main-text">'.count($diarynum).'篇</p>';
					echo "<br>";echo "<br>";echo "<br>";echo "<br>";
					for($i=0;$i<count($diarynum);$i++)
					{
						if($i==0)
						{
						echo "&nbsp";echo "&nbsp";echo "&nbsp";echo "&nbsp";}
					    echo '<span class="main-text" style="font-size:18px;">'."id:".$diarynum[$i]['id']."&nbsp"."&nbsp".$diarynum[$i]['name'].$diarynum[$i]['kind']."<br/>"."</span>"."&nbsp"."&nbsp"."&nbsp"."&nbsp";
					}
			   }
               else 
				   echo '<p class="main-text">0篇</p>';
                         ?>                            
				<p class="text-muted">游记</p>
                </div>
             </div>
			 
			 
			 <!--new row-->
                 
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
 