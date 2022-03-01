<?php
error_reporting(1);
/*--------------------------------------------------------------------------------------------
Developed by Page Myanmar
Powered by Zend Technologies
This program makes use of the Zend Scripting Language Engine!                 
---------------------------------------------------------------------------------------------*/
include('connection.php'); //include of db config file
include ('paginate.php'); //include of paginat page
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

<link rel="stylesheet" type="text/css" href="style.css"/>
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
<!-- ############################################## -->
<!-- display data starts -->
<table border="1">
<tr style="background:#CCCCCC" height="30px"><th>Name</th><th>Email</th><th>Address</th><th>Mobile</th>
<th>Image</th>
<th>&nbsp;</th><th>&nbsp;</th>
</tr>


<?php
$per_page = 2;  // number of results to show per page
$result = mysql_query("SELECT * FROM users");
$total_results = mysql_num_rows($result);
$total_pages = ceil($total_results / $per_page);//total pages we going to have

//-------------if page is setcheck------------------//
if (isset($_GET['page']))
 {
    $show_page = $_GET['page'];             //it will telles the current page
    if ($show_page > 0 && $show_page <= $total_pages) {
        $start = ($show_page - 1) * $per_page;
        $end = $start + $per_page;
    } else {
        // error - show first set of results
        $start = 0;              
        $end = $per_page;
    }
} else {
    // if page isn't set, show first set of results
    $start = 0;
    $end = $per_page;
}
// display pagination
$page = intval($_GET['page']);

$tpages=$total_pages;
if ($page <= 0)
    $page = 1;
 
	//$query=mysql_query("select * from users");
	for ($i = $start; $i < $end; $i++)  
	{
		if ($i == $total_results)
		 {
		 break;
		 }
	?>
	<tr>
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
	 <?php 
	 $reload = "index.php" . "?tpages=" . $tpages;
                    echo '<div  class="pagination"><ul>';
                    if ($total_pages > 1) {
                        echo paginate($reload, $show_page, $total_pages);
                    }
                    echo "</ul></div>";
	?>
	</td>
</tr>
</table>
<!-- display data end -->