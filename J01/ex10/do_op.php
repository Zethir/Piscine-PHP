#!/usr/bin/php
<?php
	if ($argc != 4)
		echo "Incorrect Parameters\n";
	else
	{
		if (trim($argv[2]) == '+')
			print (trim($argv[1]) + trim($argv[3]));
		else if (trim($argv[2]) == '-')
			print (trim($argv[1]) - trim($argv[3]));
		else if (trim($argv[2]) == '%')
			print (trim($argv[1]) % trim($argv[3]));
		else if (trim($argv[2]) == '*')
			print (trim($argv[1]) * trim($argv[3]));
		else if (trim($argv[2]) == '/')
			print (trim($argv[1]) / trim($argv[3]));
	}
	echo "\n";
?>
