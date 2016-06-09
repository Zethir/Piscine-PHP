#!/usr/bin/php
<?php
$i = 0;
while (1)
{
	echo "Entrez un nombre: ";
	$line = fgets(STDIN);
	if ($line == NULL)
		exit (-1);
	$line = trim($line);
	if (is_numeric($line))
	{
		if ($line % 2 == 0)
			echo "Le chiffre $line est Pair\n";
		else
			echo "Le chiffre $line est Impair\n";
	}
	else
		echo "'$line' n'est pas un chiffre\n";
}
?>
