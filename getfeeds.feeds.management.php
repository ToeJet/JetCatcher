<html>
<body>
<form action="" method="post">
<a href=".">Done</a><br />
<p id="fInfo"></p><br />
<?php
$filesDir = scandir("feeds");
$numfiles = count($filesDir);

for($i=0; $i<$numfiles; $i++)
{
    // process each file in file directory - Skipping hidden files and directories
    $fname =  $filesDir[$i];
    if ((substr($fname,0,1)==".")==false) {
        if ((substr($fname,-2)==".1")==false) {
            if ((substr($fname,-4)==".tmp")==false) {
                if ((substr($fname,-6)==".dload")==false) {

	            if (is_dir($fname)==false) {
	                $ftime = filemtime("feeds/" . $fname );
	                echo "<label style='background-color:";
	                // Color is based on age of last download
	                $fAge = (time() - $ftime) / 60 / 60 / 24;
	                if ($fAge >= 90) {
	                    //more than 90 days
                            echo "red";
                        } elseif ($fAge >= 15) {
                            // more than 2 weeks
                            echo "yellow";
                        } else {
                            echo "green";
	                }
        	        echo "'>'";
	                echo date ("Y-m-d H:i ", $ftime);
        	        echo "</label>";
                        echo " <a  onclick='ShowInfo(\"". $fname ."\")'>"  . $fname . "</a>  ";
	                echo "<br />";
	            }
                }
	    }
	}
    }
}
?>
<script>
function ShowInfo(fname)
{

//document.getElementById("fInfo").innerHTML = "<a target='_blank' href='feeds/" + fname + "'>" + fname + "</a>";
//document.getElementById("fInfo").innerHTML = "<a target='_blank' href='feeds/" + fname + "'>" + fname + "</a><br />" 
//                                           + "<a target='_blank' href='feeds/" + fname + ".1'>" + fname + ".1</a>";
document.getElementById("fInfo").innerHTML = "<a target='_blank' href='getfeeds.feeds.management.edit.php?file=feeds/" + fname + "'>" + fname + "</a><br />" 
                                           + "<a target='_blank' href='getfeeds.feeds.management.edit.php?file=feeds/" + fname + ".1'>" + fname + ".1</a>";
//document.getElementById("fInfo").innerHTML = document.getElementById("fInfo").innerHTML + "<br />" + fname + ".1";

$fcontent = $.get("feeds/" + fname);
document.getElementById("fInfo").innerHTML = document.getElementById("fInfo").innerHTML + "<br /><textarea readonly style='width:100%' >" + $fcontent + "</textarea>";

}
</script>
</form>
</body>
</html> 
