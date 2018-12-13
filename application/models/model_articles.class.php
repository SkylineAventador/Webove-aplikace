<?php


class Model_Articles extends Model_Database{
    /**
     *  Vrati seznam popularnich clanku pro uvodni stranku.
     *  @return array Obsah uvodu.
     */
    public function getMPArticles(){
        $stm = $this->getPdo()->query("SELECT * FROM ".TAB_ARTICLES." WHERE idhodnoceni > 0");
        return $stm->fetchAll();
    }
}