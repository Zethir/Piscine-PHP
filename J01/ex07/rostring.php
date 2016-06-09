#!/usr/bin/php
<?php
	function ft_split($str)
	{
		$str = eregi_replace("[ ]+", " ", $str);
		$tab = explode(" ", $str);
		return ($tab);
	}
	$tab = ft_split($argv[1]);
	$buf = array_shift($tab);
	foreach ($tab as $output)
		echo "$output ";
	echo "$buf\n";
?>
