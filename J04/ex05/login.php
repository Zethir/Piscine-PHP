<?php
session_start();
include 'auth.php';

if (auth($_POST['login'], $_POST['passwd']) == TRUE)
{
	$_SESSION['loggued_on_user'] = $_POST['login'];
	echo "<iframe name='char' src='chat.php' width='100%' height='550px' style='border:0;'></iframe>";
	echo "\n";
	echo "<iframe name='speak' src='speak.php' width='100%' height='50px' style='border:0;'></iframe>";
	echo "\n";
}
else
{
	$_SESSION['loggued_on_user'] = "";
	echo "ERROR\n";
}
?>
