<table>
		<tr>
		      <td><a href="index.php">Insert</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			   <td><a href="disp.php">Display</a></td>
			   
		</tr>
</table>
<!-- display data starts -->
<table border="1">
<tr style="background:#CCCCCC" height="30px"><th>id</th><th>Name</th><th>Email</th><th>Address</th><th>Mobile</th>
<th>Image</th>
<th>Edit</th><th>Delete</th>
</tr>


<?php
error_reporting(1);
include('connection.php');

$result = mysql_query("SELECT * FROM users");

 
	//$query=mysql_query("select * from users");
	$arr=array(0,1,2,3,4,5,6,7,8,9,10);
	for ($i = 0; $i < count($arr) ; $i++)  
	{
		
	?>
	<tr>
	<td><?php echo $i;?></td>
		<td><?php echo mysql_result($result, $i, 'name');?></td>
		<td><?php echo mysql_result($result, $i, 'email');?></td>
		<td><?php echo mysql_result($result, $i, 'address');?></td>
		<td><?php echo mysql_result($result, $i, 'mobile');?></td>
		<td><img src="image/<?php echo mysql_result($result, $i, 'email')."/".mysql_result($result, $i, 'image');?>" width="40px" /></td>
		<td><a href="edit.php?email=<?php echo mysql_result($result, $i, 'email');?>">Edit</a></td>
		<td><a href="delete.php?email=<?php echo mysql_result($result, $i, 'email');?>&image=<?php echo mysql_result($result, $i, 'image');?>">Delete</a></td>
	</tr>  
	
	<?php }  ?>
<tr>
	<td colspan="7">

	</td>
</tr>
</table>
<!-- display data end -->