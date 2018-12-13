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
        return $stm->fetchAll();
    }

    private function getAdminData(){
        return $this->getPdo()->query("");
    }

    private function getReviewerData(){
        return $this->getPdo()->query("");
    }
}