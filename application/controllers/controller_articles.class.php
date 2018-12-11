<?php
class Controller_Articles{
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
    public function getResult(Twig_Environment $twig, $p_tpl_name, $tplData)
    {
        $tplData['data'] = $this->db->getMPArticles();

        $page_template = $twig->loadTemplate($p_tpl_name);

        return $page_template->render($tplData);
    }
}

?>