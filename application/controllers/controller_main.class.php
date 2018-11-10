<?php
/**
 * Created by PhpStorm.
 * User: Dimit
 * Date: 27.10.2018
 * Time: 23:45
 */
//Disabled for exercises method testing.

//class Controller_Main extends Controller
//{
//    function action_index()
//    {
//        $this->view->generate('main_view.php', 'template_view.php');
//    }
//}

class Controller_Main {
    private $db;

    public function __construct()
    {
        //Initalizing the database for future manipulates with it.
        require_once("application/models/model_database.class.php");
        $this->db = new Model_Database();
    }

    /**
     *  Vrati obsah stranky
     * @return string Obsah stranky
     */
    public function getResult()
    {
        // TODO - nastaveni globalnich promennych pro sablonu
        global $tplData;
        // TODO - naplneni globalnich promennych
        $tplData['title'] = "Hlavní stránka konference";
        $tplData['data'] = $this->db->getMPArticles();
        //// vypsani prislusne sablony
        // zapnu output buffer pro odchyceni vypisu sablony
        ob_start();
        // pripojim sablonu, cimz ji i vykonam
        require "application/views/main_view.php";
        // ziskam obsah output bufferu, tj. vypsanou sablonu
        $obsah = ob_get_clean();

        // vratim sablonu naplnenou daty
        return $obsah;
    }
}