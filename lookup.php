<?php
	require("Includes/Config.php");

	$response = array();
	$athlete = NULL;

	// for now accept a get request
	$request = urldecode($_GET["athlete"]);
	$type 	 = urldecode($_GET["type"]);
	
	if(empty($request))
	{
		$response = array(
			"Error" => "No Athlete Supplied."
		);

		writeJSONResponse($response);

		return;
	}

	// make new superstar, diva, or alumini (right WWE? Isn't it that easy? =) )
	switch ($type) 
	{
		case 'superstar':
			$athlete   = new Superstar();
			break;
		case 'diva':
			// diva has seperate properties that are used
			$athlete   = new Diva();
			break;
		default:
			// default to super star if no type is given
			$athlete   = new Superstar();
			break;
	}

	// set search URL - replace "space" with dash first
	$athlete->setURL(fixName($request," ","-"));

	// get response from server
	$wweResponse = WWERequest::requestAthlete($athlete);

	// try replacing the "space" with "dash" because wwe seems to be 
	// unorgaized when it comes to creating superstar-names vs superstarnames
	if(!isset($wweResponse))
	{
		// set search URL
		$athlete->setURL(fixName($request," ",""));

		// get response from server
		$wweResponse = WWERequest::requestAthlete($athlete);
	}

	// if response is valid, parse otherwise, return not found
	if(!isset($wweResponse))
	{
		$response = array(
			"Response" => "Athlete is not found. Please check the spelling and Type requested or visit http://www.wwe.com if this is a mistake.",
			"Code" => 404
		);
	}
	else
	{
		$response = array(
			"Response" => WWERequest::parseAthlete($athlete, $wweResponse),
			"Code" => 200
		);
	}

	// return json response to client api
	writeJSONResponse($response);
?>