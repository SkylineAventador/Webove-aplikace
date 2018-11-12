<?php
/**
 * Created by PhpStorm.
 * User: Dimit
 * Date: 06.11.2018
 * Time: 21:59
 */
class Model_Registration extends Model_Database {

    public function submit_registration(){
        $stm = $this->getPdo()->prepare("INSERT INTO uzivatele
                                (jmeno, login, heslo, email)
                                VALUES (:jmeno, :login, :heslo, :email);");
        $stm->bindParam(":jmeno", $_POST['regUsrJmeno']);
        $stm->bindParam(":login", $_POST['regUsrLogin']);
        $stm->bindParam(":heslo", $_POST['regUsrPassword']);
        $stm->bindParam(":email", $_POST['regUsrEmail']);

        $stm->execute();
    }
}