<?php
$of=opendir("myfolder");

while($file=readdir($of))
{
  echo "<a href='download_file.php?f=$file'>".$file."<a><br/>";
}

@$f=$_GET['f'];
  if($f)
  {
    $file = ("myfolder/$f");
    $filetype=filetype($file);
    $filename=basename($file);
    header ("Content-Type: $filetype");
    header ("Content-Length: ".filesize($file));
    header ("Content-Disposition: attachment; filename=".$filename);
    readfile($file);
  }
/*
*** Developed by K-nox@KaungMyatThu To insert Your file in myfolder
  */
?>