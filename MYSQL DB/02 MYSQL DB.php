<?php
$con=mysql_connect("localhost","root","") or die(mysql_error());
// select database
mysql_select_db("Employee",$con);
//get data from html form
$name=$_GET['name'];
$eid=$_GET['eid'];
$mob=$_GET['mob'];
//Insert values in empInfo table with column name
//$query="INSERT INTO empInfo(emp_id, name, email, mobile)
//VALUES ('', '$name','$eid','$mob')";
//mysql_query($query);
//OR
//Insert values in empInfo table directly
$query="INSERT INTO empInfo
VALUES ('', '$name','$eid','$mob')";
mysql_query($query);
?>
<form>
Enter your name<input type="text" name="name" required /><hr/>
Enter your email<input type="text" name="eid" required /><hr/>
Enter your mobile<input type="text" name="mob" required /><hr/>
<input type="submit" value="INSERT"/><hr/>
</form>