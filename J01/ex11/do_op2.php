#!/usr/bin/php
<?php
	if ($argc != 2)
		echo "Incorrect Parameters\n";
	else
	{
		if (strstr($argv[1], '+') != FALSE)
		{
			$tab = explode("+", $argv[1]);
			if (ctype_digit(trim($tab[0])) && ctype_digit(trim($tab[1])) && !$tab[2])
				print (trim($tab[0]) + trim($tab[1]));
			else
				echo "Syntax Error\n";
		}
		else if (strstr($argv[1], '-') != FALSE)
		{
			$tab = explode("-", $argv[1]);
			if (ctype_digit(trim($tab[0])) && ctype_digit(trim($tab[1])) && !$tab[2])
				print (trim($tab[0]) - trim($tab[1]));
			else
				echo "Syntax Error\n";
		}
		else if (strstr($argv[1], '*') != FALSE)
		{
			$tab = explode("*", $argv[1]);
			if (ctype_digit(trim($tab[0])) && ctype_digit(trim($tab[1])) && !$tab[2])
				print (trim($tab[0]) * trim($tab[1]));
			else
				echo "Syntax Error\n";
		}
		else if (strstr($argv[1], '/') != FALSE)
		{
			$tab = explode("/", $argv[1]);
			if (ctype_digit(trim($tab[0])) && ctype_digit(trim($tab[1])) && !$tab[2])
				print (trim($tab[0]) / trim($tab[1]));
			else
				echo "Syntax Error\n";
		}
		else if (strstr($argv[1], '%') != FALSE)
		{
			$tab = explode("%", $argv[1]);
			if (ctype_digit(trim($tab[0])) && ctype_digit(trim($tab[1])) && !$tab[2])
				print (trim($tab[0]) % trim($tab[1]));
			else
				echo "Syntax Error\n";
		}
		else
			echo "Syntax Error\n";
		echo "\n";
	}
