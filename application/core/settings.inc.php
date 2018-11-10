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
// defaultni webu
const DEFAULT_PAGE = "main";
// dostupne stranky
const PAGES = array(
    "main" => array("file" => "controller_main.class.php", "object" => "Controller_Main",
        "title" => "Hlavní stránka")
);