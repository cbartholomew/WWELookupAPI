<?php
/**
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @author Christopher Bartholomew cbartholomew@gmail.com
 */

function writeJSONResponse($response)
{
	header('Content-Type: application/json');
	echo json_encode($response);
}

function writeHTMLResponse($response)
{
	
	header('Content-Type: text/html');
	echo $response;
}

function getProperty($txt)
{
	$items = explode(":", $txt);
	return array(
		"Property" => str_replace("label","",
							preg_replace("/[^A-Za-z0-9 ]/", '', $items[0])
					  	),
		"Value"	   =>  str_replace("</label>","",$items[1])
	);
}

function fixName($name, $lookFor, $replaceWith)
{
	$name = str_replace($lookFor,$replaceWith,$name);

	$name = strtolower($name);

	// replace apos for someone like "Titus O'Neil"
	$name = str_replace("'","",$name);

	return $name;
}

function fixImageTag($tag)
{
	$tag = str_replace("<img","",$tag);
	$tag = str_replace("/>","",$tag);
	$tag = str_replace("src=","",$tag);
	$tag = str_replace('"',"",$tag);
	$tag = str_replace(" ","",$tag);

	return BASE_URL . $tag;
}

?>