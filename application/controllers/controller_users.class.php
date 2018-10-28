<?php
/**
 * Created by PhpStorm.
 * User: Dimit
 * Date: 28.10.2018
 * Time: 12:10
 */

class Controller_Users extends Controller{
    function action_index()
    {
        $this->view->generate('users_view.php', 'template_view.php');
    }
}