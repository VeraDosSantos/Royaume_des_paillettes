<?php

if(isset($_GET['id']) && isset($_SESSION['user']['idUser'])){
    $idArticle = $_GET['id'];
    $idUser = $_SESSION['user']['idUser'];

    function myArticle($idArticle,$idUser)
    {
        global $mysqlClient;
        $query = "SELECT `article`.`id`, `article`.`title`, `article`.`description`, `article`.`creation_date`, `article`.`modification_date`, `article`.`id_user` 
                    FROM `article` 
                    WHERE `article`.`id` = :id_article AND `article`.`id_user` = :idUser";
        $queryStatement = $mysqlClient->prepare($query);
        $queryStatement->bindValue(':id_article', $idArticle);
        $queryStatement->bindValue(':idUser', $idUser);
        $queryStatement->execute();
        return $queryStatement->fetch();
    }

    $resultArticle = myArticle($idArticle,$idUser);

    if($resultArticle){

        if(isset($_POST['title']) && isset($_POST['description'])){
            $title = $_POST['title'];
            $description = $_POST['description'];

            $query = 'UPDATE `article` SET `title` = :title, `description` = :description, `modification_date` = :modification_date  WHERE id = :id';
            $queryStatement = $mysqlClient->prepare($query);
            $queryStatement->bindValue(':title', $title);
            $queryStatement->bindValue(':description', $description);
            $queryStatement->bindValue(':modification_date', date("Y-m-d"));
            $queryStatement->bindValue(':id', $idArticle);

            $queryStatement->execute();

            redirectToRoute('/article?id='. $idArticle);
        }

        require_once (__DIR__ . "/../Views/article/article.edit.view.php");

    } else {
        redirectToRoute('/404');
    }

}else{

    redirectToRoute('/');

}