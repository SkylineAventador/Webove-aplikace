<?php
/**
 * Created by PhpStorm.
 * User: Dimit
 * Date: 20.12.2018
 * Time: 11:47
 */

    $pdo = new PDO("mysql:host=localhost; dbname=konference_db;", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);
    $pdo->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");

    $stm = $pdo->prepare("UPDATE prispevky SET recenzent
                                                 = :jmeno WHERE id = :id");

    $stm->bindParam(":jmeno",$_POST['rCH_newReviewer']);
    $stm->bindParam(":id", $_POST['rCH_articleID']);

    $stm->execute();




