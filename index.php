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

//Creating global array type variable.
//All references at page controllers will use this variable declared at index.php.
$tplData = array();

require_once('application/core/controllers_interface.php');
require_once('application/models/model_database.class.php');

require_once (CONTROLLERS_DIRECTORY ."/Controller_uLogin.class.php");
$con_usrLogin = new Controller_uLogin();

// Testing if required page exists. If NO -> switching to default page.
$pageName = $_GET["page"];
if(isset($_GET["page"]) && array_key_exists($pageName, PAGES)){

    $page = $_GET["page"];

} else {
    if ($pageName == "logout") {
        $con_usrLogin->logout();
        header("Location: /index.php?page=main");
        die();
    } else
        header("Location: /index.php?page=error_404");
        die();
}

// Connecting a necessary controller.
require_once(CONTROLLERS_DIRECTORY ."/". PAGES[$page]['file']);
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

//Connecting the path to TWIG's views_twig folder.
$loader = new Twig_Loader_Filesystem(TEMPLATES_DIRECTORY);
$twig = new Twig_Environment($loader);

//Obtaining page title.
$tplData['title'] = PAGES[$page]['title'];
$tplData['currentPage'] = $page;


//Prihlaseni -> je odeslan formular prihlaseni?
if (isset($_POST["sbmt_lg_btn"])){
    $con_usrLogin->identifyUserDB();
    unset($_POST["sbmt_lg_btn"]);
}
//======
if ($con_usrLogin->isUserLoged()){
    $tplData['user_LogData'] = $con_usrLogin->getUserInfo();
    $tplData['user_name'] = $con_usrLogin->getDName();
}
//Connecting and printing header template.
//Page title obtained above will be used here as <title> at <head>
$header_template = $twig->loadTemplate("header.tpl.twig");
echo $header_template->render($tplData);

//Printing a processed page template output depending on authorisation.
$allowedPages = array("main","articles","error_404", "registration");
if ($con_usrLogin->getSes()->isSessionSet("user_data")){
    echo $con->getResult($twig, $p_tpl_name, $tplData); //TWIG
} else if(in_array($page,$allowedPages)){
    echo $con->getResult($twig, $page.".tpl.twig", $tplData);
} else{
    echo $con->getResult($twig, "not_authorised.tpl.twig", $tplData);
}

//Connecting and printing footer template.
$footer_template = $twig->loadTemplate("footer.tpl.twig");
echo $footer_template->render($tplData);

