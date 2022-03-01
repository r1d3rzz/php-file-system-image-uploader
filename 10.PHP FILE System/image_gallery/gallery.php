<?php
error_reporting(1);
$op=opendir("Images");
while($file=readdir($op))
{
	 if($file!='.' && $file!='..')
	 {
	echo "<img src='Images/$file' width='150px' height='150px'/> &nbsp;&nbsp;"; 
	 }
} 
 ?>

