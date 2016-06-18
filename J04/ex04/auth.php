<?php
function auth($login, $passwd)
{
	$filename = '../private/passwd';
	
	if (!$login || !$passwd || !file_exists($filename))
		return FALSE;
	
	$passwd = hash('whirlpool', $passwd);
	$tab = unserialize(file_get_contents($filename));
	
	foreach($tab as $elem)
	{
		if ($elem['login'] == $login && $elem['passwd'] == $passwd)
			return TRUE;
	}
	return FALSE;
}
