<?php 
$fname = $_GET['remfile'];
// Skip if path in name
if (false === strpos($fname, "/")) {
    // Skip if path in name
    if (false === strpos($fname, "\\")) {
        // Skip if hidden file
        if ((substr($fname,0,1)==".")==false) {
            // skip if a directory
            if (is_dir($fname)==false) {
                // make sure file exist
                if (file_exists ("files/" . $fname)) {
                    // should be in folder 'files'.
	            unlink("files/" . $fname);
	        }
	    }
        }
    }
}
?>
<META http-equiv="refresh" content="0;URL=<?php echo $_SERVER['HTTP_REFERER']; ?>">
