<?php 

/**
 *  Objekt pro praci se uzivatelem.
 *  @author Michal Nykl
 */
class Login{
    
    private $ses; // objekt MySession
    private $dName = "jmeno"; // nazev sessny pro jmeno
    private $dDate = "datum"; // nazev sessny pro datum
    
    /**
     *  Pri vytvoreni objektu zahaji session.
     */
    public function __construct(){
        include_once("mySessions-reseni.class.php");
        // inicializuju objekt sessny
        $this->ses = new MySession;
    }
    
    /**
     *  Otestuje, zda je uzivatel prihlasen
     *  @return boolean
     */
    public function isUserLoged(){
        return $this->ses->isSessionSet($this->dName);
    }
    
    /**
     *  Nastavi do session jmeno uzivatele a datum prihlaseni.
     *  @param string $userName Jmeno uzivatele.
     */
    public function login($userName){
        $this->ses->addSession($this->dName,$userName); // jmeno
        $this->ses->addSession($this->dDate,date("d. m. Y, G:m:s"));
    }
    
    /**
     *  Odhlasi uzivatele.
     */
    public function logout(){
        $this->ses->removeSession($this->dName);
        $this->ses->removeSession($this->dDate);
    }
    
    /**
     *  Vrati informace o uzivateli
     *  @return string Informace o uzivateli.
     */
    public function getUserInfo(){
        $name = $this->ses->readSession($this->dName);
        $date = $this->ses->readSession($this->dDate);
        return "Jméno: $name<br>Datum: $date<br>";
    }
    
}

?>