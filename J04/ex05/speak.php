<style>
body {margin: 0;}

textarea {
	width: 90%;
	height: 100%;
	margin: auto;
	resize:none;
	border: 1px solid black;
	border-radius: 0px 0px 0px 10px;
	background-image: linear-gradient(top, #F6AD1A 20%, #9F391A  130%);
	background-image: linear-gradient(to bottom, #F6AD1A 20%, #9F391A 130%);
	font-size: 0.9vw;
	font-family: arial;
	font-weight: lighter;
}

form {
	width: 100%;
	height: 100%;
	margin: 0;
}

input {
	float: right;
	width: 5%;
	height: 100%;
	background-color: #65537A;
	border-radius: 0px 0px 10px 0px;
	position: relative;
	font-size: 0.9vw;
	font-family: arial;
	font-weight: lighter;
	z-index: 2;
}

</style>
<form action="speak.php" method="post">
	<textarea name="text"></textarea>
	<input type="submit" value="Envoyer">
	<input type="reset" value="Reset" style="border-radius: 0px 0px 0px 0px">
</form>
<?php
if (!$_REQUEST)
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
	if (!file_exists($filename) || !file_exists("../private/"))
	{
		mkdir("../private/");
		$tab = array($array);
	}
	else
	{
		$fp = fopen($filename,"r+");
		flock($fp, LOCK_SH | LOCK_EX);
		$tab = unserialize(file_get_contents($filename));
		$tab[] = $array;
	}
	$tab = serialize($tab);
	$fp = fopen($filename, "r+");
	flock($fp, LOCK_SH | LOCK_EX);
	file_put_contents($filename, $tab);
	fclose($fp);
	include 'chat.php';
}		
?>
