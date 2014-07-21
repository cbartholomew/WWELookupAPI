<?php
/**
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @author Christopher Bartholomew cbartholomew@gmail.com
 */

class Athlete
{
	public $_name;
	public $_height;
	public $_weight;
	public $_from;
	public $_signatureMoves;
	public $_highlights;
	public $_image;

	public function setName($name)
	{
		$this->_name = $name;
	}

	public function setHeight($height)
	{
		$this->_height = $height;
	}

	public function setWeight($weight)
	{
		$this->_weight = $weight;
	}

	public function setFrom($from)
	{
		$this->_from = $from;
	}

	public function setMoves($moves)
	{
		$this->moves = $moves;
	}

	public function setHighlights($highlights)
	{
		$this->_highlights = $highlights;
	}

	public function setImage($image)
	{
		$this->_image = $image;
	}
}

?>