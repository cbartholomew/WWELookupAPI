<?php
/**
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @author Christopher Bartholomew cbartholomew@gmail.com
 */

require_once("Model/Athlete.php");

class Diva extends Athlete
{
	public $_url;

	function __construct() 
	{
		$this->_url = BASE_URI_DIVAS;

		return $this;
	}

	function setURL($searchFor)
	{
		$this->_url = BASE_URI_DIVAS . $searchFor;
	}

	function set($property, $value)
	{
		if($property === HEIGHT)
		{
			$this->_height = $value;
		}
		else if($property === WEIGHT)
		{
			$this->_weight = $value;
		}
		else if($property === FROM)
		{
			$this->_from = $value;
		}
		else if($property === SIGNATURE_MOVE)
		{
			$this->_signatureMoves = $value;
		}
		else if($property === CAREER_HIGHLIGHTS)
		{
			$this->_highlights = $value;
		}
	}
}
