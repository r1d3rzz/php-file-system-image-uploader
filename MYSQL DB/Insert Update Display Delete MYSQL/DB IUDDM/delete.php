<?php 
include('connection.php');
$sql=mysql_query("delete from users where email='{$_GET['email']}'");
unlink("image/".$_GET['email']."/".$_GET['image']);
rmdir("image/".$_GET['email']);
header('location:index.php');
?>