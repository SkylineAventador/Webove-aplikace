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
        $stm = $this->getPdo()->query("SELECT * FROM ".TAB_ARTICLES." WHERE idhodnoceni > 0");

        $return_data = $stm->fetchAll();

//        for ($i = 0; $i < count($return_data); ++$i) {
//
//        }
        return $return_data;
    }
}