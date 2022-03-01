<?php
//connect database
$con=mysql_connect("localhost","root","") or die(mysql_error());
// select database
mysql_select_db("Employee",$con);
//select values from empInfo table
$data="SELECT * FROM empInfo";
$val=mysql_query($data);
echo "<table border='1' bgcolor='pink' align='center'>";
echo "<tr><th>Emp_id</th><th>Name</th><th>Email</th><th>Mobile</th></tr>";
while(list($id,$name,$eid,$mob) = mysql_fetch_array($val))
{
echo "<tr>";
echo "<td>".$id."</td>";
echo "<td>".$name."</td>";
echo "<td>".$eid."</td>";
echo "<td>".$mob."</td>";
echo "</tr>";
}
echo "</table>";
?>