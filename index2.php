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

// TODO - test, zda je v pozadavku uvedena pozadovana stranka, jinak defaultni
if(isset($_GET["page"])
    && array_key_exists([$_GET["page"], PAGES])){

    $page = $_GET["page"];

} else {

    //$page = DEFAULT_PAGE;
    $page = "users";
}

// TODO - nacteni odpovidajiciho kontroleru, jeho zavolani a vypsani vysledku

require(CONTROLLERS_DIRECTORY ."/". PAGES[$page]['file']);

$tmp = PAGES[$page]["object"];
$con = new $tmp;

echo $con->getResult();