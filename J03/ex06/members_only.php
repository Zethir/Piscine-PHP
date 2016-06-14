<?php

$pass = ($_SERVER['PHP_AUTH_PW'] == NULL) ? NULL : $_SERVER['PHP_AUTH_PW'];
$login = ($_SERVER['PHP_AUTH_USER'] == NULL) ? NULL : $_SERVER['PHP_AUTH_USER'];

if ("zaz:jaimelespetitsponeys" === ($login . ':' . $pass))
{
	echo "<html><body>\n" . "Bonjour Zaz<br / >\n" . "<img src='data:image/png;base64," . base64_encode(file_get_contents("/nfs/2015/c/cboussau/http/MyWebSite/img/42.png")) . ">" . "\n</body></html>\n";
}
else
{
	header('WWW-Authenticate: Basic realm="Espace membres"');
	header('connection: close');
	echo "<html><body>Cette zone est accessible uniquement aux membres du site</body></html>\n";
}
?>
