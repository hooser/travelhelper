<?php
        
		$id = $_POST['photoid'];
		$name = $_POST['photoname']; 
		$kind = $_POST['kind'];
		$imgpath = '../photo/'.iconv("UTF-8", "gbk",$name).$kind;
        $img = file_get_contents($imgpath,true);
		header("Content-Type: image/jpeg;text/html; charset=utf-8");
        echo $img;		
        ?>
		