<?php
/**
 * Created by PhpStorm.
 * User: Dimit
 * Date: 27.10.2018
 * Time: 23:45
 */

class Controller_Main implements IController {
    private $db;

    public function __construct()
    {
        //Initalizing the database for future manipulates with it.
        require_once("application/models/model_articles.class.php");
        $this->db = new Model_Articles();
    }

    /**
     *  Vrati obsah stranky
     * @return string Obsah stranky
     */
    public function getResult(Twig_Environment $twig, $p_tpl_name, $tplData)
    {
        $tplData['data'] = $this->db->getMPArticles();

        $page_template = $twig->loadTemplate($p_tpl_name);

        return $page_template->render($tplData);
    }
}