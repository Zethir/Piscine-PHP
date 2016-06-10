#!/usr/bin/php
<?php
	if ($argv[1])
	{
		$str = trim($argv[1]);
		$str = preg_replace('/\s{2,}/', ' ', $str);
		echo $str. "\n";
	}
	exit;
?>
