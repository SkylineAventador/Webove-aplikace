<?php
/**
 * Created by PhpStorm.
 * User: Dimit
 * Date: 13.12.2018
 * Time: 16:33
 */
class Controller_Activity implements IController{
    /**
     * @var Model_Activity
     * Chrani v sobe instanci databazi.
     */
    private $db;

    public function getResult(Twig_Environment $twig, $p_tpl_name, $tplData)
    {
        //$tplData['activity_data'] = $this->db->getMPArticles();

        $page_template = $twig->loadTemplate($p_tpl_name);

        return $page_template->render($tplData);
    }

    public function __construct()
    {
        require_once("application/models/model_activity.class.php");
        $this->db = new Model_Activity();
    }
}