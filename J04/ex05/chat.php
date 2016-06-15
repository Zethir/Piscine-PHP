<style>
body {
	margin: 0;
	border: 1px solid black;
	border-radius: 10px 10px 0px 0px;
	background-image: linear-gradient(top, #677F35 0%, #CFFF6A 100%);
	background-image: linear-gradient(to bottom, #677F35 0%, #CFFF6A 100%);
}
</style>
<?php
	$filename = '../private/chat';
	if (!file_exists($filename) || !file_exists("../private/"))
		return ;
	$tab = unserialize(file_get_contents($filename));
	$time = date($tab['time']);
	$login = $tab['login'];
	$msg = $tab['msg'];
	echo "hello\n";
	echo $time . "" . "<b>" . $login ."</b>". ":" . $msg . "<br />";
?>


