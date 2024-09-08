<?php

if (isset($_GET['id'])) {

    $idArticle = $_GET['id'];

    function getArticleById($idValue) {
        global $mysqlClient;
        $query = "SELECT `article`.`id`, `article`.`title`, `article`.`text`, `article`.`creation_date`, `article`.`modification_date`, `article`.`id_user`, `article`.`id_subject`, `user`.`pseudo` 
                    FROM `article` 
                    INNER JOIN `user` ON `article`.`id_user` = `user`.`id` 
                    WHERE `article`.`id` = :id_article";
        $queryStatement = $mysqlClient->prepare($query);
        $queryStatement->bindValue(':id_article', $idValue);
        $queryStatement->execute();
        return $queryStatement->fetch();
    }

    function deleteArticleById($idValue){
        global $mysqlClient;
        $query = 'DELETE FROM `article` WHERE `id` = :idValue';
        $queryStatement = $mysqlClient->prepare($query);
        $queryStatement->bindValue(':idValue', $idValue);
        return $queryStatement->execute();
    }


    $article = getArticleById($idArticle);

    if(isset($_POST['idDelete'])){
        $idArticle = $_POST['idDelete'];
        deleteArticleById($idArticle);
        redirectToRoute('/');
    }

    require_once (__DIR__ . "/../Views/article/article.view.php");

}else{

    //recupere le formulaire pour créer ma requette et renvoyer sur la page de l'article créer
    require_once (__DIR__ . "/../Views/article/article.create.view.php");

}