<?php
//connect database
$con=mysql_connect("localhost","root","") or die(mysql_error());
// select database
mysql_select_db("Employee",$con);
//update values of empInfo table
$data="UPDATE empInfo SET name='Aung Htet',mobile=959777777
WHERE email='aung@gmail.com'";
$val=mysql_query($data);
?>