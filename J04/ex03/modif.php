<?php

$filename = '../private/passwd';

if (!$_POST['login'] || !$_POST['oldpw'] || !$_POST['newpw'] || $_POST['submit'] != "OK" || !file_exists($filename))
{
	echo "ERROR\n";
	return ;
}

$login = $_POST['login'];
$oldpw = hash('whirlpool', $_POST['oldpw']);
$tab = unserialize(file_get_contents($filename));

foreach ($tab as &$elem)
{
	if ($elem['login'] == $login && $elem['passwd'] == $oldpw)
	{	
		$elem['passwd'] = hash('whirlpool', $_POST['newpw']);
		$tab = serialize($tab);
		file_put_contents("../private/passwd", $tab);
		echo "OK\n";
		return ;
	}
}
echo "ERROR\n";
?>
