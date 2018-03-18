<html>
<body>
<form action='.'>
<?php
echo "<pre>Starting Refresh</pre>";
$output = shell_exec('./getfeeds.cron');
echo "<pre>$output</pre>";
?>
<input type='submit' value='Complete' />
</form>
</body>
</html> 
