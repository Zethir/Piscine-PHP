#!/usr/bin/php
<?php
	$count = 0;
	foreach($argv as $str)
	{
		if ($count == 0)
			$count = 1;
		else
			echo "$str\n";
	}
?>
