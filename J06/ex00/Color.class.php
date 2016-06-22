<?php
class Color 
{
	public $red = 0;
	public $green = 0;
	public $blue = 0;
	public static $verbose = FALSE;

	static function doc() {
		return file_get_contents('./Color.doc.txt');
	}

	public function __construct(array $kwargs)
	{
		if (array_key_exists('red', $kwargs))
			$this->red = (int)$kwargs['red'];
		if (array_key_exists('green', $kwargs))
			$this->green = (int)$kwargs['green'];
		if (array_key_exists('blue', $kwargs))
			$this->blue = (int)$kwargs['blue'];
		if (array_key_exists('rgb', $kwargs))
		{
			$this->blue = (int)($kwargs['rgb'] % 256);
			$this->green = (int)(($kwargs['rgb'] >> 8) % 256);
			$this->red = (int)(($kwargs['rgb'] >> 16) % 256);
		}
		if (self::$verbose)
			echo $this.' constructed.'.PHP_EOL;
		return ;
	}

	function __destruct() {
		if (self::$verbose)
			print($this . ' destructed.' . PHP_EOL);
	}

	function __toString() {
		return sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
	}

	public function add(Color $var)
	{
		return new Color(
			array('red' => $this->red + $var->red,
			'green' => $this->green + $var->green,
			'blue' => $this->blue + $var->blue));
	}
	public function sub(Color $var)
	{
		return new Color(
			array('red' => $this->red - $var->red,
			'green' => $this->green - $var->green,
			'blue' => $this->blue - $var->blue));
	}
	public function mult($var)
	{
		if (!is_numeric($var))
			return (NULL);
		return new Color(
			array('red' => $this->red * $var,
			'green' => $this->green * $var,
			'blue' => $this->blue * $var));
	}
}
?>
