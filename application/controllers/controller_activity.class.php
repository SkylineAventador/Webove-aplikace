<?php
/**
 * Created by PhpStorm.
 * User: Dimit
 * Date: 13.12.2018
 * Time: 16:33
 */
class Controller_Activity implements IController{
    /**
     * @var Model_Activity
     * Chrani v sobe instanci databazi.
     */
    private $db;

    public function getResult(Twig_Environment $twig, $p_tpl_name, $tplData)
    {
        if (isset($_SESSION["user_data"])) {
            switch ($_SESSION["user_data"]["idprava"]) {
                //Autor
                case 0:
                    {
                        $tplData['activity_data'] = $this->db->getActData(0);
                        break;
                    }
                //Spravce
                case 2:
                    {
                        $tplData['activity_data'] = $this->db->getActData(2);
                        break;
                    }
                //Rezenzent
                case 3:
                    {
                        $tplData['activity_data'] = $this->db->getActData(3);
                        break;
                    }
            }

            //Ověření odeslání formulářů.
            $this->checkSubmits();
        }

        $page_template = $twig->loadTemplate($p_tpl_name);

        return $page_template->render($tplData);
    }

    public function __construct()
    {
        require_once("application/models/model_activity.class.php");
        $this->db = new Model_Activity();
    }

    private function checkSubmits()
    {
        if (isset($_POST['name_submit_newArticle'])) {
            $this->db->addNewArticle($_SESSION['user_data']['jmeno'],
                $_POST['name_nA_titleTF'], $_POST['name_editor_newArticle']);
            unset($_POST['name_submit_newArticle']);
            header("Location: ?page=activity");
            die();
        }
    }
}