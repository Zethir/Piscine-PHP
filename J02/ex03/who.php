#!/usr/bin/php
<?php
date_default_timezone_set('CET');
$handle = fopen("/var/run/utmpx", "r");
while ($buffer = fread($handle, 628))
{
	$buff_unpack = unpack("a256user/a4id/a32line/ipid/itype/I2time/a256host/i16pad", $buffer);
	if ($buff_unpack["type"] == 7)
	{
		$user[$buff_unpack["line"]] = array("user" => $buff_unpack["user"], "time" => $buff_unpack["time1"]);
	}
}
ksort($user);
foreach($user as $line => $data)
{
		printf("% -7s  % -7s  %s \n", $data["user"], $line, date("M  j H:i", $data["time"]));
}
?>
