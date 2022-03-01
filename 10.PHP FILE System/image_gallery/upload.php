<?php
error_reporting(1);
if(isset($_POST['upd']))
{
if(file_exists("Images"."/".$_FILES['f1']['name']))
{
echo '<font color="red">Pic already exists!!</font>';
}
else
{
move_uploaded_file($_FILES['f1']['tmp_name'],"Images"."/".$_FILES['f1']['name']);

header('location:gallery.php');

}
}
?>
<html>
<body>
<center>
<font color="red">
<form method="post" enctype="multipart/form-data">
Choose your image:<input type="file" name="f1"><br>
<input type="submit" name="upd" value="Upload">
</form>
</center>
</font>
</body>
</html>