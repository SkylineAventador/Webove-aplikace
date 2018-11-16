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

// Connecting a necessary controller.
require(CONTROLLERS_DIRECTORY ."/". PAGES[$page]['file']);

//Obtaining a controller class name.
$tmp = PAGES[$page]["object"];
//Creating a controller instance.
$con = new $tmp;

//Obtaining a matching twig template name.
$p_tpl_name = "$page.tpl.twig";

//===================================
//Connecting TWIG itself
require_once "application/core/twig-master/lib/Twig/Autoloader.php";
Twig_Autoloader::register();

//Connecting the path to TWIG's templates folder.
$loader = new Twig_Loader_Filesystem(TEMPLATES_DIRECTORY);
$twig = new Twig_Environment($loader);

global $tplData;
$tplData['title'] = PAGES[$page]['title'];

//Connecting and printing header template.
$header_template = $twig->loadTemplate("header.tpl.twig");
echo $header_template->render($tplData);

//Printing a processed page template output.
echo $con->getResult($twig, $p_tpl_name); //TWIG

//Connecting and printing footer template.
$footer_template = $twig->loadTemplate("footer.tpl.twig");
echo $footer_template->render($tplData);