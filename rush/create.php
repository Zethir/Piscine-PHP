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
$sql = "INSERT INTO users (username, password, name, classe) VALUES ('$login','$passwd','$name', 1)";
mysqli_query($mysqli, $sql);

header('Location: ./index.php');
?>
