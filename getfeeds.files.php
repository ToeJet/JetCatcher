<html>
<body>
<form action="" method="post">

<select id="PlayList" size=15 style="width:100%" onchange='ShowPlayer(this.value)'>
<?php
$filesDir = scandir("files");
$numfiles = count($filesDir);

for($i=0; $i<$numfiles; $i++)
{
    // process each file in file directory - Skipping hidden files and directories
    $fname =  $filesDir[$i];
    if ((substr($fname,0,1)==".")==false) {
        if (is_dir($fname)==false) {
            echo "<option id=". $i . " value='" . $fname ."'>" . $fname . "</option>";
        }
    }
}
?>
</select>
<script>
function SelectPlayer(nav)
{
    //$fname =  "<?php echo getcwd(); ?>/files/" . document.getElementById("PlayList").value;
    $fname =  realpath("files/" + document.getElementById("PlayList").value);
    document.getElementById("curplayer").pause();
    $newid = document.getElementById("PlayList").options.selectedIndex + nav;
    $newvalue = document.getElementById("PlayList").options[$newid].value;
    document.getElementById("PlayList").value = $newvalue;
    ShowPlayer($newvalue);
    
//    if (document.getElementById("autodelete").checked == true) {
//        unlink($fname);
//    }
}
function ConfirmDelete(fname)
{
    document.getElementById("cDel").innerHTML = "Delete " + fname + " <a href='getfeeds.fileremove.php?remfile=" + fname + "'>Confirm</a>";
}
function ShowPlayer(fname)
{
    $pmode = "audio";
    $ptype = "audio/mpeg";
    switch (fname.substring(fname.lastIndexOf("."))) {
    case ".ogg":
        $pmode = "audio";
        $ptype = "audio/ogg";
        break;
    case ".mp3":
        $pmode = "audio";
        $ptype = "audio/mpeg";
        break;
    case ".m4a":
        $pmode = "audio";
        $ptype = "audio/mpeg";
        break;
    case ".mp4":
        $pmode = "video";
        $ptype = "video/mpeg";
        break;
    case ".wav":
        $pmode = "audio";
        $ptype = "audio/mpeg";
        break;
    }
    document.getElementById("fPlayer").innerHTML = "<" + $pmode + " id=curplayer controls autoplay onended='SelectPlayer(1)' > <source src='files/" + fname + "' type='" + $ptype + "'></" + $pmode + ">"
												 + "<br />"
//                                                 + "<button type='button' onclick='SelectPlayer(-1)'>&lt</button>"
//                                                 + "<button type='button' onclick='SelectPlayer(1)'>&gt</button>"
                                                 + "<label style='background-color:cyan'><a target='player' href='files/" + fname + "'>" + fname + "</a></label>"
                                                 + "<button type='button' onclick='ConfirmDelete(\"" + fname + "\")'>X</button>" ;
;

    //echo "hi \n";	

    if (document.getElementById("autoplay").checked == true) {
        document.getElementById("curplayer").autoplay="autoplay";
        document.getElementById("curplayer").play();
    }
}
</script>
<!--
<input id='autoplay' type='checkbox'><label for="autoplay">Auto Play</label>
<input id='autoadvance' type='checkbox'><label for="autoadvance">Auto Advance</label>
<input id='autodelete' type='checkbox'><label for="autodelete">Auto Delete</label> 
-->
<p id="fPlayer"></p><br />
<p id="cDel"></p></form>
</body>
</html> 
