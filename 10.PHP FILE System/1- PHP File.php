<?php
    if(isset($_POST['save']))
    {
        $f=$_POST['file'];
        $ext=$_POST['ext'];
        $data=$_POST['data'];
        $file=$f.$ext;
            if(file_exists($file))
            {
                echo "<font color='red'>file already exists</font>";
            }
            else
            {
                $fo = fopen($file,"w");
                fwrite($fo,$data);
                echo "your data is saved";
            }
    }
?>
<form method="post">
    enter your file<input type="text" name="file"/><br/>
        choose your extension
            <select name="ext">
                <option value="">choose ur exten</option>
                <option>.txt</option>
                <option>.html</option>
                <option>.php</option>
            </select><br/>
                Enter your contents
                    <textarea rows="10" cols="30" name="data">
                        <?php echo @$contents ; ?>
                    </textarea><br/>
        <input type="submit" value="Save" name="save"/>
</form>