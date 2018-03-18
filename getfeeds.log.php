<html>
<body>
<form action="" method="post">
<a href=".">Done</a><br />
<select id="logfile" >
<?php
$filesDir = scandir(".");
$numfiles = count($filesDir);
for($i=0; $i<$numfiles; $i++)
{
//     echo "<option id=".  __FILE__ . " value='" .  __FILE__ ."'>" .  __FILE__ . "</option>";
    $fname =  $filesDir[$i];
    if ((substr($fname,0,1)==".")==false) {
        if (is_dir($fname)==false) {
            if ($fname !== __FILE__) {
                if (stripos($fname, ".log" ) !==false) {
                    echo "<option id=". $i . " value='" . $fname ."'>" . $fname . "</option>";
                }
            }
        }
    }
}
?>
</select>
<textarea name="text" style="width:100%;height:90%" >
<?php
// configuration
$file = __FILE__;
$file = substr($file, 0, strrpos($file, '.'));
echo file_get_contents($file);
?>
</textarea>
</form>
</body>
</html> 
