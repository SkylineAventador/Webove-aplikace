<?php


class Model_Articles extends Model_Database{
    /**
     *  Vrati seznam popularnich clanku pro uvodni stranku.
     *  @return array Obsah uvodu.
     */
    public function getAllArticles(){
        $stm = $this->getPdo()->query("SELECT * FROM prispevky
                                      WHERE idhodnoceni > 0");
        $return_data = $stm->fetchAll();

        for ($i = 0; $i < count($return_data); ++$i){
            $idhodnoceni = $return_data[$i]["idhodnoceni"];
                $stm = $this->getPdo()->query("SELECT * FROM hodnoceni
                                      WHERE idhodnoceni = $idhodnoceni");
                $return_data[$i]["hodnoc_data"] = $stm->fetch(2);
        }
        return $return_data;
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