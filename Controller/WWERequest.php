<?php
/**
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @author Christopher Bartholomew cbartholomew@gmail.com
 */

class WWERequest
{
	public static function requestAthlete($athlete)
	{
		// build search context
		$context = WWERequest::getContext(
			WWERequest::getRequestOptions("GET")
		);

		// return the contents
		$response = file_get_contents($athlete->_url, false, $context);

		// check the result 
		$status = $http_response_header[0];

		if($status == "HTTP/1.0 302 Moved Temporarily" ||
		   $status == "HTTP/1.0 404 Not Found")
		{
			return NULL;
		}
		else
		{
			return $response;
		}
	}

	public static function parseAthlete($athlete, $wweResponse)
	{		
		// create new scrapper instance
		$html = new simple_html_dom();

		// load response from server
		$html->load($wweResponse);

		// extract the full name
		$fullName = $html->find(ELEMENT_NAME_HEADER);

		// image url
		$athleteImage = $html->find(ELEMENT_MAIN_IMAGE);

		// get the main image only
		$newImageURL = fixImageTag($athleteImage[0]->innertext);

		// set the new url for the athlete
		$athlete->setImage($newImageURL);

		// set the name for the athlete
		$athlete->setName($fullName[0]->innertext);

		// get the collection of attributes for the athlete
		$collection = $html->find(ELEMENT_ATTRIBUTES);

		// dynamically set the attributes for the object
		for ($i=0, $n=count($collection); $i < $n  ; $i++) 
		{ 
			$element = getProperty($collection[$i]->innertext);
			$athlete->set($element["Property"],$element["Value"]);
		}

		return $athlete;
	}

	public static function getContext($options)
	{
		return stream_context_create($options);
	}

	public static function getRequestOptions($method)
	{
		// build request
		return array(
			"HTTP" => array(
				"METHOD"  => $method
			)			
		);
	}
}

?>