<?php
error_reporting(1);

$upload = "images";
$file_name = $_FILES['img']['name'];
$file_tmp = $_FILES['img']['tmp_name'];
$file_type = $_FILES['img']['type'];
$file_ext = strtolower(end(explode('.',$file_name)));
$fileext_arr = ['jpg','jepg','png'];
$file = $upload."/".$file_name;

if(isset($_POST['upload'])){
    if(file_exists($file)){
        echo "<script>alert('Your File is Already Exits')</script>";
    }else{
        if(in_array($file_ext,$fileext_arr) === true){
            move_uploaded_file($file_tmp,$file);
            echo "<script>alert('Upload Successfully')</script>";
            echo "<script>location='gallery.php'</script>";
        }else{
            echo "<script>alert('Your File must be PNG OR JEPG Type')</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <table border="1">
            <tr>
                <td>Upload File</td>
                <td><input type="file" name="img" id=""></td>
            </tr>
            <tr>
                <td><a href="/">HOME</a></td>
                <td align="center"><input type="submit" value="Upload" name="upload"></td>
            </tr>
        </table>
    </form>
</body>
</html>