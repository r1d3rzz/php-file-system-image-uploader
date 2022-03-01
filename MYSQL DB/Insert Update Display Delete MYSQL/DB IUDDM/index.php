<table>
		<tr>
		      <td><a href="index.php">Insert</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			   <td><a href="disp.php">Display</a></td>
			   
		</tr>
</table>

<?php
error_reporting(1);
/*--------------------------------------------------------------------------------------------
Page Myanmar student only!                
---------------------------------------------------------------------------------------------*/
include('connection.php'); //include of db config file
extract($_POST); 
if($save)
{
//check user already exists or not
$q=mysql_query("select email from users where email='$e'");
$r=mysql_num_rows($q);
if($r)
{
echo "<font color='red'>$e already exists</font>";
}
else
{

//for image
$img=$_FILES['img']['name'];
//hobbies
$hobbies=implode(",",$hobb);
//dob
$dob=$yy."-".$mm."-".$dd;

//save data
$query="insert into users values('','$n','$e','$p','$add','$mob','$gen','$img','$hobbies','$c','$dob',now())";
mysql_query($query);

//save user's image
mkdir("image/$e");
move_uploaded_file($_FILES['img']['tmp_name'],"image/$e/".$_FILES['img']['name']);

echo "<font color='blue'>Congrates !</font>";
}
}
?>


	<body>
		<form method="post" enctype="multipart/form-data">
			<table border="1">
			<tr>
				<Td>Name</td>
				<td><input type="text" name="n" required/></td>
			</tr>
			<tr>
				<Td>Email</td>
				<td><input type="email" name="e" required/></td>
			</tr>
			<tr>
				<Td>Password</td>
				<td><input type="password" name="p" required/></td>
			</tr>
			<tr>
				<Td>Address</td>
				<td><textarea name="add" required></textarea></td>
			</tr>
			
			<tr>
				<Td>Mobile</td>
				<td><input type="text" pattern="[0-9]*" maxlength="10" name="mob" required/></td>
			</tr>
			<tr>
				<Td>gender</td>
				<td>
				male<input type="radio" name="gen" value="m" required/>
				female<input type="radio" name="gen" value="f" required/>
				</td>
			</tr>
			<tr>
				<Td>hobbies</td>
				<td>
				
				cricket<input type="checkbox"  name="hobb[]" value="cricke"/>
				singing<input type="checkbox" name="hobb[]" value="singing"/>
				dancing<input type="checkbox" name="hobb[]" value="dancing"/>
				
				</td>
			</tr>
			<tr>
				<Td>country</td>
				<td>
				<select style="width:220px"  name="c" required>
					<option value="" selected="selected" disabled="disabled">select your country</option>
					<option>myanmar</option>
					<option>thai</option>
					<option>china</option>
				</select>
				</td>
			</tr>
			<tr>
				<Td>Dob</td>
				<td>
				<select  name="yy" required>
					<option value="" selected="selected" disabled="disabled">Year</option>
				<?php 
				for($i=1900;$i<=2015;$i++)
				{
				echo "<option value='$i'>".$i."</option>";
				}
				?>	
				</select>	
				<select  name="mm" required>
					<option value="" selected="selected" disabled="disabled">Month</option>
				<?php 
				for($i=1;$i<=12;$i++)
				{
				echo "<option value='$i'>".$i."</option>";
				}
				?>	
				</select>
				<select  name="dd" required>
					<option value="" selected="selected" disabled="disabled">Year</option>
				<?php 
				for($i=1;$i<=31;$i++)
				{
				echo "<option value='$i'>".$i."</option>";
				}
				?>	
				</select>		
				</td>
			</tr>
			<tr>
				<Td>Image</td>
				<td><input type="file" name="img" required></td>
			</tr>
			<tr>
				<td colspan="2">
				<input type="submit" name="save" value="Insert Data"/>
				</td>
			</tr>
			</table>
		</form>
	</body>

