<?php
class Vertex 
{
	private $_x = 0.0;
	private $_y = 0.0;
	private $_z = 0.0;
	private $_w = 1.0;
	private $_Color = 0;
	public static $verbose = FALSE;

	static function doc() {
		return file_get_contents('./Vertex.doc.txt');
	}
	public function __get($att) { 
		return "trying to access \' " .$att. "\', Hello World".PHP_EOL; 
	}
	public function __set($att, $value) { 
		return "trying to set '$att' at " .$value. ", Hello world again".PHP_EOL; 
	}

	public function __construct(array $kwargs)
	{
		if (array_key_exists('x', $kwargs))
			$this->_x = (double)$kwargs['x'];
		if (array_key_exists('y', $kwargs))
			$this->_y = (double)$kwargs['y'];
		if (array_key_exists('z', $kwargs))
			$this->_z = (double)$kwargs['z'];
		if (array_key_exists('w', $kwargs))
			$this->_w = (double)$kwargs['w'];
		if (array_key_exists('color', $kwargs))
			$this->_Color = $kwargs['color'];
		else
			$this->_Color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
		if (self::$verbose)
			print($this . ' constructed.' . PHP_EOL);
		return ;
	}

	function __destruct() {
		if (self::$verbose)
			print($this . ' destructed.' . PHP_EOL);
	}

	function __toString() {
		if (self::$verbose)
			return sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s )", $this->_x, $this->_y, $this->_z, $this->_w, $this->_Color);
		else if (self::$verbose == FALSE)
			return sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w);
	}
}
?>
