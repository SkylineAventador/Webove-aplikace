<?php
/**
 * Created by PhpStorm.
 * User: Dimit
 * Date: 03.11.2018
 * Time: 20:36
 */
class Controller_Registration extends Controller {
    function action_index()
    {
        $this->view->generate('registration_view.php', 'template_view.php');
    }

}