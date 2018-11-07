<?php
/**
 * Created by PhpStorm.
 * User: Dimit
 * Date: 07.11.2018
 * Time: 21:08
 */
class Model_Users extends Model{
    private $pdo;
    public function __construct(){
        $this->pdo = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME,
            DB_USER, DB_PASS);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
    }

    //TEST FUNCTION!!!
    public function load_users(){
        $sql = "SELECT jmeno, email FROM uzivatele";
        $stm = $this->pdo->query($sql);
        $users = $stm->fetchAll();

        foreach ($users as $row) {
            echo "<div class=\"card w-25 d-inline-block mr-0\">
                   <img class=\"card-img-top\" src=\"../../images/unknown_user_img.png\" 
                        alt=\"User image\">
                   <div class=\"card-body\">
                      <h4 class=\"card-title\">".$row["jmeno"]."</h4>
                     <p class=\"card-text\">".$row["email"]."</p>
                     <a href=\"#\" class=\"btn btn-primary\" style=\"display: block\">Zobrazit profil</a>
                  </div>
               </div>";
        }
    }
}