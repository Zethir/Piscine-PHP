<?php
session_start();
include './config.php';

$login = $_POST['login'];
$passwd = $_POST['passwd'];
if (!$login || !$passwd)
{
	$_SESSION['loggued_on_user'] = "";
	echo "Wrong login or password\n";
	echo '<META HTTP-EQUIV=REFRESH CONTENT="1;index.php">';
	exit();
}
	$mysqli = mysqli_connect($mysqli_host, $mysqli_user, $mysqli_pass, $mysqli_db, $mysqli_port);	
	$passwd = hash('whirlpool', $passwd);
	$sql = "SELECT * FROM users WHERE username='$login'";
	$tab = mysqli_query($mysqli, $sql) or die('erreur SQL');
	
	if (($row = mysqli_fetch_assoc($tab)) == NULL)
	{
		$_SESSION['loggued_on_user'] = "";
		echo "Wrong login or password\n";
		echo '<META HTTP-EQUIV=REFRESH CONTENT="1;index.php">';
		exit();
	}
	else if ($row['password'] != $passwd)
	{
		$_SESSION['loggued_on_user'] = "";
		echo "Wrong login or password\n";
		echo '<META HTTP-EQUIV=REFRESH CONTENT="1;index.php">';
		exit();
	}
	$_SESSION['loggued_on_user'] = $_POST['login'];
	$_SESSION[$_POST[login]][panier] = $_SESSION[guest][panier];
	$_SESSION[$_POST[login]][table] = $_SESSION[guest][table];
	$_SESSION[guest][panier] = array();
	$_SESSION[guest][table] = array();
	echo '<META HTTP-EQUIV=REFRESH CONTENT="1;index.php">';
	echo "Welcome\n";
	mysqli_close($mysqli);
	exit ();
?>
