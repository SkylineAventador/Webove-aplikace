<?php
/**
 * Created by PhpStorm.
 * User: Dimit
 * Date: 28.10.2018
 * Time: 12:10
 */

class Controller_Users implements IController {
//    function action_index()
//    {
//        $this->view->generate('users_view.php', 'template_view.php');
//    }

    private $db;

    public function __construct()
    {
        //Initalizing the database for future manipulates with it.
        require_once("application/models/model_users.class.php");
        $this->db = new Model_Users();
    }

    /**
     *  Vrati obsah stranky
     * @return string Obsah stranky
     */
    public function getResult(Twig_Environment $twig, $p_tpl_name, $tplData)
    {
        $tplData['users'] = $this->db->getAllUsers();

        $page_template = $twig->loadTemplate($p_tpl_name);

        return $page_template->render($tplData);
    }
}