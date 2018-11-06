<?php
/**
 * Created by PhpStorm.
 * User: Dimit
 * Date: 06.11.2018
 * Time: 21:59
 */
class Model_Registration extends Model{

    private $pdo;
    public function __construct(){
        $this->pdo = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME,
            DB_USER, DB_PASS);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
    }

    public function submit_registration(){
        $stm = $this->pdo->prepare("INSERT INTO uzivatele
                                (jmeno, login, heslo, email)
                                VALUES (:jmeno, :login, :heslo, :email);");
        $stm->bindParam(":jmeno", $_POST['regUsrJmeno']);
        $stm->bindParam(":login", $_POST['regUsrLogin']);
        $stm->bindParam(":heslo", $_POST['regUsrPassword']);
        $stm->bindParam(":email", $_POST['regUsrEmail']);

        $stm->execute();
    }
}