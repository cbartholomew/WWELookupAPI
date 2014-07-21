<?php
/**
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @author Christopher Bartholomew cbartholomew@gmail.com
 */

session_start();
error_reporting(E_ALL);

ini_set("display_errors", true);

define("BASE_URL","http://www.wwe.com");
define("BASE_URI_SUPERSTAR", "http://www.wwe.com/superstars/");
define("BASE_URI_DIVAS","http://www.wwe.com/superstars/divas/");
define("HEIGHT","Height");
define("WEIGHT","Weight");
define("FROM","From");
define("SIGNATURE_MOVE","Signature Move");
define("CAREER_HIGHLIGHTS","Career Highlights");
define("ELEMENT_ATTRIBUTES","div[class=info single]");
define("ELEMENT_NAME_HEADER","h1");
define("ELEMENT_MAIN_IMAGE", ".main-image");

/* Load Scrap Library */
require("Library/simple_html_dom.php");

/* Load Main Models */
require("Model/Superstar.php");
require("Model/Diva.php");

/* Load Main Controller */
require("Controller/WWERequest.php");

/* Load Main Utilities */
require("Utility/Helpers.php");
?>