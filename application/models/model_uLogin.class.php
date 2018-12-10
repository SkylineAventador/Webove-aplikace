<?php
/**
 * Created by PhpStorm.
 * User: Dimit
 * Date: 23.11.2018
 * Time: 9:58
 */

class Model_uLogin extends Model_Database {
    public function user_identify_DB($login, $password){
        $query = $this->getPdo()->query("SELECT * FROM uzivatele WHERE 
                                        login = \"$login\" AND heslo = $password");

        $user_DB_info = $query->fetchAll();

        return $user_DB_info;
    }
}
