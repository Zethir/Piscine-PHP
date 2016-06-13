#!/usr/bin/php
<?php
	function loupe($matches)
	{
		return "<" . $matches[1] . "</head>\n" . $matches[2] . "title=\"" . strtoupper($matches[3]) . "\">" . strtoupper($matches[4]) . "</a>\n" . $matches[5] . ">" . strtoupper($matches[6]) . "<img" . $matches[7] . "title=\"" . strtoupper($matches[8]) . "\"</a>\n" . $matches[9];
	}

	$file = fopen($argv[1], "r");
	while (!feof($file))
	{
		$line = trim(fgets($file));
		$content .= $line;
	}
	fclose($file);
	$pattern = '/<(.*?)<\/head>(.*)title=[\"|\'](.*?)[\"|\']>(.*?)<\/a>(.*).com>(.*)<img(.*)title=[\"|\'](.*)[\"|\']><\/a>(.*)/';
	echo preg_replace_callback($pattern, "loupe", $content);
	echo "\n";
?>
