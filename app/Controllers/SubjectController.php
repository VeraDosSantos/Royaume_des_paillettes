<?php

if (isset($_GET['id'])) {
    $idSubject = $_GET['id'];

    function getArticlesBySubject($idValue)
    {
        global $mysqlClient;
        $query = "SELECT `id`, `title`, `creation_date`, `modification_date` FROM `article` WHERE `id_subject` = :id_subject";
        $queryStatement = $mysqlClient->prepare($query);
        $queryStatement->bindValue(':id_subject', $idValue);
        $queryStatement->execute();
        return $queryStatement->fetchAll();
    }

    $articles = getArticlesBySubject($idSubject);

    require_once(__DIR__ . '/../Views/subject/subject.view.php');
}else{
    redirectToRoute('/');
}
