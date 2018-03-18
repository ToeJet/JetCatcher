<html>
<body>
<form action="" method="post">

<select size=15 style="width:100%" onchange='ShowPlayer(this.value)'>
<?php
$filesDir = scandir("files");
$numfiles = count($filesDir);

for($i=0; $i<$numfiles; $i++)
{
    // process each file in file directory - Skipping hidden files and directories
    $fname =  $filesDir[$i];
    if ((substr($fname,0,1)==".")==false) {
        if (is_dir($fname)==false) {
            echo "<option value='" . $fname ."'>" . $fname . "</option>";
        }
    }
}
?>
</select>
<script>
function ConfirmDelete(fname)
{
    document.getElementById("cDel").innerHTML = "Delete " + fname + " <a href='getfeeds.fileremove.php?remfile=" + fname + "'>Confirm</a>";
}
function ShowPlayer(fname)
{
    switch (fname.substring(fname.lastIndexOf("."))) {
    case ".ogg":
        document.getElementById("fPlayer").innerHTML = "<audio controls> <source src='files/" + fname + "' type='audio/ogg'></audio>";
        break;
    case ".mp3":
        document.getElementById("fPlayer").innerHTML = "<audio controls> <source src='files/" + fname + "' type='audio/mpeg'></audio>";
        break;
    case ".m4a":
        document.getElementById("fPlayer").innerHTML = "<audio controls> <source src='files/" + fname + "' type='audio/mpeg'></audio>";
        break;
    case ".mp4":
        document.getElementById("fPlayer").innerHTML = "<video controls> <source src='files/" + fname + "' type='video/mp4'></video>";
        break;
    case ".wav":
        document.getElementById("fPlayer").innerHTML = "<audio controls> <source src='files/" + fname + "' type='audio/mpeg'></video>";
        break;
    }
    document.getElementById("fPlayer").innerHTML = document.getElementById("fPlayer").innerHTML + "<br />"
                                                 + "<button type='button' onclick='ConfirmDelete(\"" + fname + "\")'>X</button>"
                                                 + "<label style='background-color:cyan'><a target='player' href='files/" + fname + "'>" + fname + "</a></label>";
}
</script>
<p id="fPlayer"></p><br />
<p id="cDel"></p></form>
</body>
</html> 
