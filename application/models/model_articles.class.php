<?php


class Model_Articles extends Model_Database{
    /**
     *  Vrati seznam popularnich clanku pro uvodni stranku.
     *  @return array Obsah uvodu.
     */
    public function getAllArticles(){
        $stm = $this->getPdo()->query("SELECT * FROM ".TAB_ARTICLES." WHERE idhodnoceni > 0");
        return $stm->fetchAll();
    }

    public function getBestArticles(){
        $stm = $this->getPdo()->query("SELECT prispevky.* 
                                               FROM prispevky, hodnoceni 
                                               WHERE hodnoceni.idhodnoceni = prispevky.idhodnoceni
                                               AND hodnoceni.znamka = 1");
//        echo "<pre>";
//        print_r($stm->fetchAll());
//        echo "</pre>";
        return $stm->fetchAll();
    }
}