<?php
ob_start();
@header("HTTP/1.1 503 Service Temporarily Unavailable");
@header("Status: 503 Service Temporarily Unavailable");
@header("Retry-After: 120");
@header("Connection: Close");
?><!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html><head>
<title>503 Service Temporarily Unavailable</title>
</head><body>
<h1>Service Temporarily Unavailable</h1>
<p>The server is temporarily unable to service your
request due to maintenance downtime or capacity
problems. Please try again later.</p>
</body></html>
<?php
$g = ob_get_clean();
echo $g;
exit;
exit();
?>