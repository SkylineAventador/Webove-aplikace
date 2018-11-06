<?php
/**
 * Created by PhpStorm.
 * User: Dimit
 * Date: 27.10.2018
 * Time: 23:35
 */
class Controller {

    public $model;
    public $view;

    public function __construct()
    {
        $this->view = new View();
    }

    function action_index()
    {
    }
}