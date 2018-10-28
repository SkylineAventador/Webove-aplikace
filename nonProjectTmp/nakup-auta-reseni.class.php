<?php 

/**
 *  Objekt pro praci s vyberem automobilu.
 *  @author Michal Nykl
 */
class NakupAuta{
    
    private $coo; // objekt MyCookies
    private $dWheels = "kola"; // nazev cookie pro kola
    private $dColor = "barva"; // nazev cookie pro barvu
    
    /**
     *  Pri vytvoreni objektu zahaji session.
     */
    public function __construct(){
        include_once("myCookies-reseni.class.php");
        // inicializuju objekt sessny
        $this->coo = new MyCookies;
    }
    
    /**
     *  Otestuje, zda už existují informace o vybraném automobilu.
     *  @return boolean
     */
    public function isSelectedCar(){
        return $this->coo->isCookieSet($this->dWheels);
    }
    
    /**
     *  Nastavi do cookies pocet kol a barvu automobilu.
     *  @param integer $wheels Pocet kol.
     *  @param string $color Barva.
     */
    public function createCar($wheels, $color){
        $this->coo->addCookie($this->dWheels,$wheels); // kola
        $this->coo->addCookie($this->dColor,$color);
    }
    
    /**
     *  Smaze informace o automobilu.
     */
    public function deleteCar(){
        $this->coo->removeCookie($this->dWheels);
        $this->coo->removeCookie($this->dColor);
    }
    
    /**
     *  Vrati informace o poctu kol.
     *  @return string
     */
    public function getWheels(){
        return $this->coo->readCookie($this->dWheels);        
    }
    
    /**
     *  Vrati informace o barve.
     *  @return string
     */
    public function getColor(){
        return $this->coo->readCookie($this->dColor);
    }
    
    /**
     *  Vytvoří informace o daném automobilu.
     *  @return string Informace.
     */
    public function getInfo(){
        $str = "";
        for($i=0; $i<intval($this->getWheels()); $i++){
            $str .= "<div style='width:50px;height:50px;margin:5px;float:left;background-color:".$this->getColor().";'></div>";
        }
        return $str;
    }
    
}

?>