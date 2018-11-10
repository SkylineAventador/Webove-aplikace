<?php
/**
 * Created by PhpStorm.
 * User: Dimit
 * Date: 10.11.2018
 * Time: 18:18
 */
// vynuceni chybovych vypisu na students.kiv.zcu.cz
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

// Loading server's settings
require_once("application/core/settings.inc.php");

// Test if required page exists.
if(isset($_GET["page"])
    && array_key_exists([$_GET["page"], PAGES])){

    $page = $_GET["page"];

} else {

    $page = DEFAULT_PAGE;
}

// Connecting the neccessary controller
require(CONTROLLERS_DIRECTORY ."/". PAGES[$page]['file']);

//Obtaining the controller's class name.
$tmp = PAGES[$page]["object"];
//Creating the instance.
$con = new $tmp;

//Calling the controller's page processing.
echo $con->getResult();