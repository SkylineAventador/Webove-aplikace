<?php
/**
 * Created by PhpStorm.
 * User: Dimit
 * Date: 23.11.2018
 * Time: 22:42
 */
class Controller_Error_404 implements IController {
    public function getResult(Twig_Environment $twig, $p_tpl_name, $tplData)
    {
        $page_template = $twig->loadTemplate($p_tpl_name);
        return $page_template->render($tplData);
    }

    public function __construct()
    {
    }
}