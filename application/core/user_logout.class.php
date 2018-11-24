<?php
/**
 * Created by PhpStorm.
 * User: Dimit
 * Date: 23.11.2018
 * Time: 16:08
 */

class User_Logout{
    public function usr_logout(Controller_uLogin $usr_con){

        if(isset($_SESSION[$usr_con->getDName()])){
            $usr_con->logout();
        }
    }
}