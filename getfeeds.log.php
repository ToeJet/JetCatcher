<html>
<body>
<form action="" method="post">
<a href=".">Done</a><br />
<?php 
$logfname = $_POST['logfile'];
if (empty($logfname)) { $logfname = "getfeeds.log"; }
echo '<select name="logfile" value="' . $logfname . '" onchange="this.form.submit()">';

//$filesDir = scandir(".");
$filesDir = glob("*.log");
$numfiles = count($filesDir);
for($i=0; $i<$numfiles; $i++)
{
//     echo "<option id=".  __FILE__ . " value='" .  __FILE__ ."'>" .  __FILE__ . "</option>";
    $fname =  $filesDir[$i];
    if (is_dir($fname)==false) {
        echo "<option id=". $i . " value='" . $fname ."'";
        if ($fname == $logfname) { echo ' selected="selected"' ; }
        echo ">" . $fname . "</option>";
    }
}
?>
</select> <?php //getElementsByTagName('logfile').value = $logfname; ?>
<textarea id="filetextarea" style="width:100%;height:90%" >
<?php echo file_get_contents($logfname); ?>
</textarea>
</form>
</body>
</html> 
