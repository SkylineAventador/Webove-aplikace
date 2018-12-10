<?php
/**
 * Created by PhpStorm.
 * User: Dimit
 * Date: 11.11.2018
 * Time: 14:47
 */
class Controller_uLogin{
    private $ses; // objekt User_Session
    private $dName = "jmeno"; // nazev sessny pro jmeno
    private $dDate = "datum"; // nazev sessny pro datum
    private $user_data = "user_data"; //nazev sessny pro data uzivatele

    /**
     *  Pri vytvoreni objektu zahaji session.
     */
    public function __construct(){
        include_once("application/core/user_session.class.php");
        // inicializuju objekt sessny
        $this->ses = new User_Session();
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
        $this->ses->addSession($this->dDate,date("d. m. Y, H:i"));
    }

    /**
     *  Odhlasi uzivatele.
     */
    public function logout(){
        $this->ses->removeSession($this->dName);
        $this->ses->removeSession($this->dDate);
        $this->ses->removeSession($this->user_data);
    }

    /**
     *  Vrati informace o uzivateli
     *  @return string Informace o uzivateli.
     */
    public function getUserInfo(){
//        $name = $this->ses->readSession($this->dName);
//        $date = $this->ses->readSession($this->dDate);
        global $tplData;
        $tplData["user_db_info"] = $this->ses->readSession($this->user_data);
        return $this->ses->readSession($this->dDate);
    }

    /**
     * @return string
     */
    public function getDName()
    {
        $name = $this->ses->readSession($this->dName);
        return $name;
    }

    public function identifyUserDB(){
        include_once ("application/models/model_uLogin.class.php");
        $model_con = new Model_uLogin();
        global $tplData;
        $tplData["user_db_info"] = $model_con->user_identify_DB($_POST["lfModal_uname"],
            $_POST["lfModal_psw"]);
        if (!empty($tplData["user_db_info"])) {
            $this->login($tplData["user_db_info"][0]['jmeno']);
            $this->ses->addSession($this->user_data, $tplData["user_db_info"][0]);
        } else{
            ?><script>alert("Zadal(a) jste špatné přihlášovací údaje. " +
                    "Zkuste prosím ještě jednou.")</script><?php
        }
    }

    /**
     * @return User_Session
     */
    public function getSes()
    {
        return $this->ses;
    }


}