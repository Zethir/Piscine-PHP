<?php
session_start();
if (!$_SESSION['loggued_on_user'])
{	
	echo "ERROR\n";
	return;
}
if ($_POST['submit'] == "Envoyer" && $_POST['text'] != "")
{
	date_default_timezone_set('Europe/Paris');
	$login = $_SESSION['loggued_on_user'];
	$time = time();
	$msg = $_POST['text'];
	$filename = '../private/chat';
	$array = array(
		"login" => "$login",
		"time" => "$time",
		"msg" => "$msg",
	);
	if (!file_exists($filename))
	{
		if (!file_exists("../private/"))
			mkdir("../private/");
		$tab = array($array);
		$tab = serialize($tab);
		file_put_contents($filename, $tab);
	}
	else
	{
		$fp = fopen($filename,"r+");
		flock($fp, LOCK_SH | LOCK_EX);
		$tab = unserialize(file_get_contents($filename));
		$tab[] = $array;
		$tab = serialize($tab);
		file_put_contents($filename, $tab);
	}
	$fp = fopen($filename, "r+");
	flock($fp, LOCK_SH | LOCK_EX);
	fclose($fp);
}		
?>
<head>
<style>
body {
	margin: 0;
}

textarea {
	width: 80%;
	height: 100%;
	margin: auto;
	resize:none;
	border: 1px solid white;
	border-radius: 0px 0px 0px 10px;
	background-color: black;
	font-size: 13px;
	font-family: arial;
	font-weight: lighter;
	color: white;
	padding: 5px 5px 5px 5px;
}

form {
	width: 100%;
	height: 100%;
	margin: 0;
}

input {
	float: right;
	width: 10%;
	height: 100%;
	background-color: black;
	border-radius: 0px 0px 10px 0px;
	position: relative;
	font-size: 13px;
	font-family: arial;
	font-weight: lighter;
	z-index: 2;
	color: white;
}
</style>
<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
</head>
<form action="speak.php" method="post">
	<textarea name="text" placeholder="Entrez votre message ici."></textarea>
	<input type="submit" name="submit" value="Envoyer">
	<input type="reset" value="Reset" style="border-radius: 0px 0px 0px 0px">
</form>
