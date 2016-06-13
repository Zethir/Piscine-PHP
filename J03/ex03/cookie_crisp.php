<?php
	if (isset($_GET["action"]))
		$action = $_GET["action"];

	if (isset($_GET["name"]))
		$name = $_GET["name"];

	if (isset($_GET["value"]))
		$value = $_GET["value"];
	if ($name == NULL)
		echo "Il faut entrer un nom de cookie";

	if ($action == "set")
		setcookie($name, $value, time() + 3600);

	if ($action == "get")
		echo $_COOKIE[$name];

	if ($action == "del")
		setcookie($name, NULL, -1);
?>
