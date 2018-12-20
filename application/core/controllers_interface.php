<?php
/**
 * Created by PhpStorm.
 * User: Dimit
 * Date: 13.12.2018
 * Time: 16:26
 */

/**
 * Interface IController
 * Interface ktery prebiraji vsechny kontrollery pro zajisteni funkcnosti TWIGU.
 */
interface IController{
    /**
     * @param Twig_Environment $twig
     * Instance TWIGu ktera bude renderovat sablonu.
     * @param $p_tpl_name
     * Nazev sablony pro render.
     * @param $tplData
     * Data pro vykreslovani v sablone.
     */
    public function getResult(Twig_Environment $twig, $p_tpl_name, $tplData);

    public function __construct();
}