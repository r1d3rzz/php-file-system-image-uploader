<?php 
error_reporting(1);
include('connection.php');
$sql=mysql_query("select * from users where email='{$_GET['email']}'");
$row=mysql_fetch_array($sql);
extract($_POST); 
if($upd)
{
mysql_query("update users set name='$n',password='$p',address='$add',mobile='$mob' where email='{$_GET['email']}'");
header('location:index.php');
}
?>
<html>

	<body>
		<form method="post" enctype="multipart/form-data">
			<table>
			<tr>
				<Td>Name</td>
				<td><input type="text" name="n" value="<?php echo $row['name'];?>"/></td>
			</tr>
			<tr>
				<Td>Email</td>
				<td><input readonly="readonly" value="<?php echo $row['email'];?>" type="email" name="e"/></td>
			</tr>
			<tr>
				<Td>Password</td>
				<td><input value="<?php echo $row['password'];?>" type="password" name="p"/></td>
			</tr>
			<tr>
				<Td>Address</td>
				<td>
				<textarea name="add">
				<?php echo $row['address'];?>
				</textarea></td>
			</tr>
			
			<tr>
				<Td>Mobile</td>
				<td><input value="<?php echo $row['mobile'];?>" type="text" pattern="[0-9]*" name="mob"/></td>
			</tr>
			<tr>
				<Td colspan="2" align="center">
				<input type="submit" value="Update My records" name="upd"/>
				</Td>
			</tr>
			</table>
			</form>
			</body>
			</html>