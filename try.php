<?php
$myfile = fopen("../diary/newfile.txt", "r+") or die("Unable to open file!");
echo fread($myfile,filesize("../diary/newfile.txt"));
fclose($myfile);
?>