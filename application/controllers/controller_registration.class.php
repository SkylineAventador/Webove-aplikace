<?php
/**
 * Created by PhpStorm.
 * User: Dimit
 * Date: 03.11.2018
 * Time: 20:36
 */
class Controller_Registration implements IController {

    private $db;

    public function __construct()
    {
        require_once "application/models/model_registration.class.php";
        $this->db = new Model_Registration();
    }

    /**
     *  Vrati obsah stranky
     * @return string Obsah stranky
     */
    public function getResult(Twig_Environment $twig, $p_tpl_name, $tplData)
    {
        if (isset($_POST["reg_submitBtn"])) {
            $this->submit_registration();
            unset($_POST["reg_submitBtn"]);
            return require_once "application/views_php/service/regComplete_view.php";
        }
        $page_template = $twig->loadTemplate($p_tpl_name);

        return $page_template->render($tplData);
    }

    public function submit_registration(){
        $this->db->submit_registration();
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