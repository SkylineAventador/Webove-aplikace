<?php
/**
 * Created by PhpStorm.
 * User: Dimit
 * Date: 03.11.2018
 * Time: 20:36
 */
class Controller_Registration extends Controller {

    public function __construct(){
        $this->model = new Model_Registration();
        $this->view = new View();
    }

    function action_index()
    {
        $this->view->generate('registration_view.php', 'template_view.php');
    }

    function action_submit(){
        $this->model->submit_registration();

    }

}