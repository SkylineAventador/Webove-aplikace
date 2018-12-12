<?php
/**
 * Created by PhpStorm.
 * User: Dimit
 * Date: 10.11.2018
 * Time: 18:33
 */
class Model_Database {

    /** @var PDO $pdo Objekt pracujici s databazi prostrednictvim PDO */
    private $pdo;

    public function __construct() {
        // nactu nastaveni
        require_once("application/core/settings.inc.php");
        // inicializace DB
        $this->pdo = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASS);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
        $this->pdo->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
    }

    /**
     * @return PDO
     */
    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     *  Vrati seznam popularnich clanku pro uvodni stranku.
     *  @return array Obsah uvodu.
     */
    public function getMPArticles(){
        $stm = $this->pdo->query("SELECT * FROM ".TAB_ARTICLES." WHERE idhodnoceni > 0");
        return $stm->fetchAll();
    }


    /**
     *  Vrati seznam vsech uzivatelu pro spravu uzivatelu.
     *  @return array Obsah spravy uzivatelu.
     */
    public function getAllUsers(){
        $stm = $this->pdo->query("SELECT jmeno, email, idprava FROM ".TAB_USERS);
        return $stm->fetchAll();
    }

    /**
     *  Smaze daneho uzivatele z DB.
     *  @param integer $userId  ID uzivatele.
     */
    public function deleteUser($userId){

    }
}