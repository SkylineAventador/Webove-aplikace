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
        $stm->bindParam(":jmeno", $jmeno);
        $stm->bindParam(":login", $login);
        $stm->bindParam(":heslo", $heslo);
        $stm->bindParam(":email", $email);

        $jmeno = "Pokus User";
        $login = "pokusUsr";
        $heslo = "123456";
        $email = "pokus@example.com";

        $stm->execute();
    }
}