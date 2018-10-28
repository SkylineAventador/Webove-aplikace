<?php

/**
 *  Objekt pro praci s cookies.
 *  @author Michal Nykl
 */
class MyCookies{
    
    private $defExpire; // 1 den, v konstruktoru
    
    /**
     *  Pri vytvoreni objektu nastavim defaultni cas expirace cookies.
     */
    public function __construct(){
        $this->defExpire = 60*60*24;
    }
    
    
    /**
     *  Funkce pro ulozeni hodnoty do cookies.
     *  @param string $name Jmeno promenne.
     *  @param object $value Hodnota
     */
    public function addCookie($name, $value, $expire=null){
        if(!isset($expire)){ // defaultni
            $expire = $this->defExpire;
        }        
        setcookie($name,$value,time()+$expire);        
    }
    
    /**
     *  Vrati hodnotu daneho cookies nebo null, pokud cookies neni nastavena.
     *  @param string $name Jmeno promenne.
     *  @return object
     */
    public function readCookie($name){
        if($this->isCookieSet($name)){ // ano
            return $_COOKIE[$name];
        } else { // ne
            return null;
        }
    }
    
    /**
     *  Je cookie nastavena?
     *  @return boolean
     */
    public function isCookieSet($name){
        return isset($_COOKIE[$name]);
    }
    
    
    /**
     *  Odstrani danou cookie.
     *  @param string $name Jmeno promenne.
     */
    public function removeCookie($name){
        $this->addCookie($name,null,0);
    }
    
}


?>