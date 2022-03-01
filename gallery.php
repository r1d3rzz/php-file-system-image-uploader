<?php
    $images = "images";
    $fo = opendir($images);

    while($file = readdir($fo)){
        if($file !== "." && $file !==".."){
            echo "<img src='$images/$file' style='width: 150px;'>"; 
        }
    }
?>
<?="<br/>"?>
<a href="/">Go Home</a>