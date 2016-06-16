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
if (!file_exists($filename) || !($tab = unserialize(file_get_contents($filename))|| !file_exists("../private/")))
	return ;
$tab = unserialize(file_get_contents($filename));
$login = $tab[0]['login'];
$time = date($tab[0]['time']);
$msg = $tab[0]['msg'];
echo $time . "" . "<b>" . $login ."</b>". ":" . $msg . "<br />";
?>
