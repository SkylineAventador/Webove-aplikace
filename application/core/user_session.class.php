<?php
/**
 * Created by PhpStorm.
 * User: Dimit
 * Date: 11.11.2018
 * Time: 14:36
 */
class User_Session {

    private $con_cookies;
    /**
     *  Pri vytvoreni objektu zahaji session.
     */
    public function __construct(){
        session_start(); // zahajim
        require_once "application/core/user_cookies.class.php";
        $this->con_cookies = new User_Cookies();
    }

    /**
     *  Funkce pro ulozeni hodnoty do session.
     *  @param string $name Jmeno promenne.
     *  @param object $value Hodnota
     */
    public function addSession($name, $value){
        $_SESSION[$name] = $value;
    }

    /**
     *  Vrati hodnotu dane session nebo null, pokud session neni nastavena.
     *  @param string $name Jmeno promenne.
     *  @return object
     */
    public function readSession($name){
        if($this->isSessionSet($name)){ // ano
            return $_SESSION[$name];
        } else { // ne
            return null;
        }
    }

    /**
     *  Je session nastavena?
     *  @return boolean
     */
    public function isSessionSet($name){
        return isset($_SESSION[$name]);
    }


    /**
     *  Odstrani danou session.
     *  @param string $name Jmeno promenne.
     */
    public function removeSession($name){
        unset($_SESSION[$name]);
    }

    public function addSessionData($name, array $data)
    {
        $cislo_udaje = 0;
        foreach ($data as $dataIndex) {
            $_SESSION[$name][$cislo_udaje] = $dataIndex;
            $cislo_udaje ++;
        }
    }

    public function readSessionData($name)
    {
        if (!empty($_SESSION[$name])) {
            return $_SESSION[$name];
        } else
            return null;
    }
}