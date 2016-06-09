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
	sort($res);
	foreach($res as $line)
		echo "$line\n";
?>
