<?php

if (!$_POST['login'] || !$_POST['passwd'] || $_POST['submit'] != "OK")
{
	echo "ERROR\n";
	return ;
}

$login = $_POST['login'];
$passwd = hash('whirlpool', $_POST['passwd']);
$filename = '../private/passwd';

$array = array(
	"login" => "$login", 
	"passwd" => "$passwd",
);

if (!file_exists($filename) || !file_exists("../private/"))
{
	mkdir("../private/");
	$tab = array($array);
}
else
{
	$tab = unserialize(file_get_contents("../private/passwd"));
	foreach ($tab as $elem)
	{
		if ($elem['login'] == $login)
		{
			echo "ERROR\n";
			return ;
		}
	}
	$tab[] = $array;
}
$tab = serialize($tab);
file_put_contents("../private/passwd", $tab);
header('Location: ./index.html');
echo "OK\n";
exit ();
?>
