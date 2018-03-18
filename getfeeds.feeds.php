<html>
<body>
<form action="" method="post">
<input type="submit" value="Submit" />
<input type="reset" />
<a href=".">Done</a>
<br />
<?php

// configuration
$file = __FILE__;
$file = substr($file, 0, strrpos($file, '.'));

// check if form has been submitted
if (isset($_POST['text']))
{
    // save the text contents
    copy($file, $file . '.1');
    file_put_contents($file, str_replace('^M', '', $_POST['text']));
    //file_put_contents($file, $_POST['text']);
}
?>
<textarea name="text" style="width:100%;height:90%" ><?php echo file_get_contents($file) ?></textarea>
</form>
</body>
</html> 
