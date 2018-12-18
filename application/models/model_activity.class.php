<?php

class Model_Activity extends Model_Database{

    public function getActData($user_idprava)
    {
        $returnData = null;
        switch ($user_idprava) {
            case 0:
                $returnData = $this->getAutorData();
                break;
            case 2:
                $returnData = $this->getAdminData();
                break;
            case 3:
                $returnData = $this->getReviewerData();
                break;
        }

        return $returnData;
    }

    private function getAutorData(){
        $autor_name = $_SESSION['user_data']['jmeno'];
        $stm = $this->getPdo()->query("SELECT * FROM prispevky
                                      WHERE author = \"$autor_name\"");
        $return_data = $stm->fetchAll();

        foreach ($return_data as $article) {
            $article["text"] = htmlspecialchars_decode($article["text"]);
            print_r($article['text']);
        }

        for ($i = 0; $i < count($return_data); ++$i){
            $idhodnoceni = $return_data[$i]["idhodnoceni"];
            if ($idhodnoceni != -1){
                $stm = $this->getPdo()->query("SELECT * FROM hodnoceni
                                      WHERE idhodnoceni = \"$idhodnoceni\"");
                $return_data[$i]["hodnoc_data"] = $stm->fetch(2);
            }
        }
        return $return_data;
    }

    private function getAdminData(){
        $stm = $this->getPdo()->query("");
        $return_data = $stm->fetchAll();

        return $return_data;
    }

    private function getReviewerData(){
        return $this->getPdo()->query("");
    }

    public function addNewArticle($autor_name, $title, $content)
    {
        $stm = $this->getPdo()->prepare("INSERT INTO ".TAB_ARTICLES."
                                (author, title, text)
                                VALUES (:author, :title, :text);");

        $stm->bindParam(":author", $autor_name);
        $stm->bindParam(":title", $title);
        $stm->bindParam(":text", $content);

        $stm->execute();
    }
}