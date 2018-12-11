<?php
/**
 * Created by PhpStorm.
 * User: Dimit
 * Date: 03.11.2018
 * Time: 20:30
 */
// databaze
define("DB_SERVER","localhost");
define("DB_NAME","konference_db");
define("DB_USER","root");
define("DB_PASS","");

// nazvy tabulek v DB
//define("TAB_USERS", "kravtsov_uzivatele"); pro STUDENTS
define("TAB_USERS", "uzivatele"); //pro LOCALHOST

//define("TAB_ARTICLES", "kravtsov_uzivatele"); pro STUDENTS
define("TAB_ARTICLES", "prispevky"); //pro LOCALHOST

//// Dostupne stranky webu a jejich prechody
// adresar kontroleru
const CONTROLLERS_DIRECTORY = "application/controllers";

//adresar sablon TWIGU
const TEMPLATES_DIRECTORY = "application/templates";

// defaultni webu
const DEFAULT_PAGE = "main";

const NOT_FOUND_PAGE = "error_404";

// dostupne stranky
const PAGES = array(
    "main" => array("file" => "controller_main.class.php", "object" => "Controller_Main",
        "title" => "Hlavní stránka"),
    "users" => array("file" => "controller_users.class.php", "object" => "Controller_Users",
        "title" => "Uživatele"),
    "registration" => array("file" => "controller_registration.class.php",
        "object" => "Controller_Registration",
        "title" => "Registrace uživatele"),
    "error_404" => array("file" => "controller_error_404.class.php", "object" => "Controller_Error_404",
        "title" => "Error 404 - Stránka není nalezená"),
    "articles" => array("file" => "controller_articles.class.php", "object" => "Controller_Articles",
        "title" => "Všechny publikace")
);