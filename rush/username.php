<?php
include './config.php';
session_start();

if ($_SESSION[loggued_on_user] === "")
	$user = "guest";
else
	$user = $_SESSION[loggued_on_user];

if (!$_POST['name'] || $_POST['submit'] != "Valider")
{
	echo "Please type a pseudo\n";
	echo '<META HTTP-EQUIV=REFRESH CONTENT="1;username.html">';
	exit ();
}

$oldlog = $user;
$newlog = $_POST['name'];

$mysqli = mysqli_connect($mysqli_host, $mysqli_user, $mysqli_pass, $mysqli_db, $mysqli_port);
$sql = "SELECT * FROM `users` WHERE `username`='".$newlog."'";
$req = mysqli_query($mysqli, $sql);
$data = mysqli_fetch_row($req);
if (!$data) {
	$sql = "UPDATE `users` SET `username`= '".$newlog."' WHERE `username`= '".$oldlog."' ";
	mysqli_query($mysqli, $sql);
	$_SESSION['loggued_on_user'] = $newlog;
	mysqli_close($mysqli);
	echo "Pseudo successfully change !";
	echo '<META HTTP-EQUIV=REFRESH CONTENT="2;account.html">';
}
else {
	mysqli_close($mysqli);
	echo 'Username already used! Retard';
	echo '<META HTTP-EQUIV=REFRESH CONTENT="2;account.html">';
}
?>
