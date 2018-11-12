<?php
/**
 * Created by PhpStorm.
 * User: Dimit
 * Date: 03.11.2018
 * Time: 20:36
 */
class Controller_Registration {

//    public function __construct(){
//        $this->model = new Model_Registration();
//        $this->view = new View();
//    }
//
//    function action_index()
//    {
//        $this->view->generate('registration_view.php', 'template_view.php');
//    }
//
//    function action_submit(){
//        $this->model->submit_registration();
//
//    }

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
        // nastaveni globalnich promennych pro sablonu
        //global $tplData;

        // naplneni globalnich promennych
        //$tplData['title'] = "Uzivatele konference";
        //$tplData['data'] = $this->db->getAllUsers();

        //// vypsani prislusne sablony
        // zapnu output buffer pro odchyceni vypisu sablony
        ob_start();
        // pripojim sablonu, cimz ji i vykonam
        require "application/views/registration_view.php";
        // ziskam obsah output bufferu, tj. vypsanou sablonu
        $obsah = ob_get_clean();

        // vratim sablonu naplnenou daty
        return $obsah;
    }

    public function submit_registration(){
        require_once "application/models/model_registration.class.php";
        $db = new Model_Registration();
        $db->submit_registration();
    }

    //Konzervovano

//    public function areFieldsSetted(){
//        $fields = array($_POST['regUsrJmeno'], $_POST['regUsrLogin'], $_POST['regUsrPassword'],
//            $_POST['regUsrEmail']);
//        foreach ($fields as $key => $field) {
//            if (!empty($field)) {
//                return false;
//            }
//        }
//        return true;
//    }

}