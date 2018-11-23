<?php
/**
 * Created by PhpStorm.
 * User: Dimit
 * Date: 23.11.2018
 * Time: 16:08
 */
User_Logout::usr_logout();

class User_Logout{
    public static function usr_logout(){
        require_once "../controllers/controller_uLogin.class.php";
        $con_auth = new Controller_uLogin();

        require_once "user_session.class.php";
        $usr_session = new User_Session();

        require_once "../../index2.php";
        global $tplData;
        if($usr_session->isSessionSet($tplData['user_name'])){
            $usr_session = $usr_session->readSession($tplData["user_name"]);
            $con_auth->logout($usr_session);
        }

    }
}