<?php
include './config.php';
session_start();

if (!$_SESSION['loggued_on_user'])
{
	echo ("Refresh: 2, url=index.html");
	echo "Can't delete an account when not loggued in\n";
}

$login = $_SESSION['loggued_on_user'];
$newpw = hash('whirlpool', "!@#$%^&*()_123456789qwerty");

$mysqli = mysqli_connect($mysqli_host, $mysqli_user, $mysqli_pass, $mysqli_db, $mysqli_port);
$sql = "UPDATE `users` SET `password`='".$newpw.".' WHERE `username`='".$login."';";
mysqli_query($mysqli, $sql);
mysqli_close($mysqli);
$_SESSION['loggued_on_user'] = "";
echo "Account successfully deleted\n";
echo '<META HTTP-EQUIV=REFRESH CONTENT="2;index.php">';
?>
