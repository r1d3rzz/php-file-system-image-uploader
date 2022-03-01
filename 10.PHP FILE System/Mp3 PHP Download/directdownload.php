<html><body>

<?php
$filename = $_GET['file'];
if (isset($filename))
{
// Prevents access to something that is not in the same directory as "/download/" change "/" this script
if(substr_count($filename,"/download/") > 0)
{
die('This should not happen.');
};
$len = filesize($filename);
header('Pragma: public');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Cache-Control: public');
header('Content-Description: File Transfer');
header('Content-Type: application/force-download');
header('Content-Disposition: attachment; filename='.$filename);
header('Content-Transfer-Encoding: binary');
header('Content-Length: '.$len);
ob_clean();
    flush();
readfile($filename);
}
else
{
die('No file specified.');
};
?>

</body></html>