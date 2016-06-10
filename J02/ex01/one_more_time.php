#!/usr/bin/php
<?php
	function change_month($month)
	{
		$tab = array("Janvier" => 1,
					"Fevrier" => 2,
					"Mars" => 3,
					"Avril" => 4,
					"Mai" => 5,
					"Juin" => 6,
					"Juillet" => 7,
					"Aout" => 8,
					"Septembre" => 9,
					"Octobre" => 10,
					"Novembre" => 11,
					"Decembre" => 12);
		return $tab[$month];
	}
	date_default_timezone_set('UTC');
	if (preg_match("/(Lundi|Mardi|Mercredi|Jeudi|Vendredi|Samedi|Dimanche) ([1-2][0-9]|[1-9]|[3][0-1]|[0][1-9]) (Janvier|Fevrier|Mars|Avril|Mai|Juin|Juillet|Aout|Septembre|Octobre|Novembre|Decembre) ([0-9]{4}) ([0-1][0-9])|([2][0-3]:[0-5][0-9]):([0-5][0-9])/", $argv[1], $res))
		echo mktime($res[5], $res[6], $res[7], change_month($res[3]), $res[2], $res[4]). "\n";
	else
		echo "Wrong Format\n";
	exit;
?>
