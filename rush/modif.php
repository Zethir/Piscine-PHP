<?php
include './config.php';

if (!$_POST['login'] || !$_POST['oldpw'] || !$_POST['newpw'] || $_POST['submit'] != "Valider")
{
	header("Refresh: 2; url=modif.html");
	echo "Missing Login, Old password or New password\n";
}

$login = $_POST['login'];
$oldpw = hash('whirlpool', $_POST['oldpw']);
$newpw = hash('whirlpool', $_POST['newpw']);

$mysqli = mysqli_connect($mysqli_host, $mysqli_user, $mysqli_pass, $mysqli_db, $mysqli_port);
$sql = "SELECT * FROM users WHERE username='$login'";
$tab = mysqli_query($mysqli, $sql) or die('erreur SQL');

if (($row = mysqli_fetch_assoc($tab)) == NULL)
{
	echo "Wrong login or old password\n";
	echo '<META HTTP-EQUIV=REFRESH CONTENT="2;modif.html">';
	exit ();
}
else if ($row['password'] != $oldpw)
{
	echo "Wrong login or old password\n";
	echo '<META HTTP-EQUIV=REFRESH CONTENT="2;modif.html">';
	exit ();
}

$sql = "INSERT INTO users VALUES '$newpw'";
mysqli_query($mysqli, $sql);
mysqli_close($mysqli);
header('Refresh: 1; url=index.php');
echo "Password successfully change !";
?>
