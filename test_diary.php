<?php
        
		$id = $_POST['photoid'];
		$name = $_POST['photoname']; 
		$kind = $_POST['kind'];
		$filepath = '../diary/'.iconv("UTF-8", "gbk",$name).$kind;
		$myfile = fopen($filepath, "r") or die("Unable to open file!");
        echo fread($myfile,filesize($filepath));
        fclose($myfile);
        ?>
		
	