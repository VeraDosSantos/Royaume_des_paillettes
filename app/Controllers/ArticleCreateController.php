<?php

if(isset($_GET['subject'])){
    $idSubject = $_GET['subject'];

    if(isset($_POST['title']) && isset($_POST['text'])){
        $id_user = $_SESSION['user']['idUser'];
        $title = $_POST['title'];
        $text = $_POST['text'];

        $query = 'INSERT INTO `article` ( `title`, `text`, `creation_date`, `id_user`, `id_subject`) VALUES ( :title, :text, :creation_date, :id_user, :id_subject)';
        $queryStatement = $mysqlClient->prepare($query);
        $queryStatement->bindValue(':title', $title);
        $queryStatement->bindValue(':text', $text);
        $queryStatement->bindValue(':creation_date', date("Y-m-d"));
        $queryStatement->bindValue(':id_user', $_SESSION['user']['idUser']);
        $queryStatement->bindValue(':id_subject', $idSubject);

        $queryStatement->execute();

        $last_id = $mysqlClient->lastInsertId();

        redirectToRoute('/article?id='. $last_id);
    }

    require_once (__DIR__ . "/../Views/article/article.create.view.php");

}else{

    //recupere le formulaire pour créer ma requette et renvoyer sur la page de l'article créer
    require_once (__DIR__ . "/../Views/article/article.create.view.php");

}