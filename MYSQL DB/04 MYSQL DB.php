<?php
//connect database
$con=mysql_connect("localhost","root","") or die(mysql_error());
// select database
mysql_select_db("Employee",$con);
//delete one row
$data="DELETE FROM empInfo
WHERE email='aung@gmail.com'";
$val=mysql_query($data);
?>