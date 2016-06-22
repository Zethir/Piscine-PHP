<?php
include './config.php';

if (!$_POST['login'] || !$_POST['passwd'] || !$_POST['name'] || $_POST['submit'] != "Valider")
{
	header("Refresh: 2; url=create.html");
	echo "Login, Password or Name missing\n";
	return ;
}

$login = $_POST['login'];
$passwd = hash('whirlpool', $_POST['passwd']);
$name = $_POST['name'];

$mysqli = mysqli_connect($mysqli_host, $mysqli_user, $mysqli_pass, $mysqli_db, $mysqli_port);
$sql = "SELECT * FROM `users` WHERE `username`='".$login."'";
$req = mysqli_query($mysqli, $sql);
$data = mysqli_fetch_row($req);
if (!$data) {
	$sql = "INSERT INTO users (username, password, name, classe) VALUES ('$login','$passwd','$name', 1)";
	mysqli_query($mysqli, $sql);
	mysqli_close($mysqli);
	echo 'Well done account successfully created';
	echo '<META HTTP-EQUIV=REFRESH CONTENT="2;index.php">';
}
else {
	mysqli_close($mysqli);
	echo 'Username already used! Retard';
	echo '<META HTTP-EQUIV=REFRESH CONTENT="2;create.html">';
}
?>
