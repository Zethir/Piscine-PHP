<?php
$filename = '../private/chat';
if (!file_exists($filename) || !($tab = unserialize(file_get_contents($filename))|| !file_exists("../private/")))
	return ;
$tab = unserialize(file_get_contents($filename));
foreach($tab as $elem)
{
	echo "[" . date('H:i', $elem['time']) ."] " . "<b>" . $elem['login'] ."</b>". ": " . $elem['msg'] . "<br />";
}
?>
<style>
body {
	margin: 0;
	padding: 5px 5px 5px 5px;
	border: 1px solid white;
	border-radius: 10px 10px 0px 0px;
	background-color: black;
	color: white;
	font-size: 15px;
}
</style>
