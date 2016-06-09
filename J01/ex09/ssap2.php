#!/usr/bin/php
<?php
	function check_tab($str)
	{
		if ($str == NULL)
			return FALSE;
		else
			return TRUE;
	}
	$res = [];
	$count = 0;
	if ($argv > 1)
	{
		foreach($argv as $str)
		{
			if ($count > 0)
			{
				$tab = array_filter(explode(" ", $str), check_tab);
				$res = array_merge($res, $tab);
			}
			$count++;
		}
	}
	natcasesort($res);
	$alpha = array();
	$digit = array();
	$spec = array();
	foreach ($res as $elem)
	{
		if (ctype_alpha($elem[0]))
			$alpha[] = $elem;
		else if (ctype_digit($elem[0]))
			$digit[] = $elem;
		else
			$spec[] = $elem;
	}
	foreach ($alpha as $str)
		echo $str."\n";
	foreach ($digit as $str1)
		echo $str1."\n";
	foreach ($spec as $str2)
		echo $str2."\n";
?>
