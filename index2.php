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

// Testing if required page exists. If NO -> switching to default page.
$pageName = $_GET["page"];
if(isset($_GET["page"]) && array_key_exists($pageName, PAGES)){

    $page = $_GET["page"];

} else {

    $page = DEFAULT_PAGE;
}

// Connecting the neccessary controller and process the user query.
require(CONTROLLERS_DIRECTORY ."/". PAGES[$page]['file']);

$tmp = PAGES[$page]["object"];
$con = new $tmp;

echo $con->getResult();