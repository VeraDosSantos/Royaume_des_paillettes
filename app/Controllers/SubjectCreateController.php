<?php

$role = $_SESSION['user']['role'];

if ($role === 'admin') {
    if (isset($_POST['name'])) {

        $name = $_POST['name'];
        $description = $_POST['description'];
        $creationDate = date("Y-m-d");

        $subjectQuery = "INSERT INTO `subject` (`name`, `description`, `creation_date`) VALUES (:name, :description, :creation_date)";

        $subjectStatement = $mysqlClient->prepare($subjectQuery);

        $subjectStatement->bindParam(':name', $name);
        $subjectStatement->bindParam(':description', $description);
        $subjectStatement->bindParam(':creation_date', $creationDate);

        // j'execute la requete
        $subjectStatement->execute();

        // je redirige l'utilisateur vers la page user pour qu'il vois le nouveau produit
        redirectToRoute('/');
    }
    require_once(__DIR__ . '/../Views/subject/subject.create.view.php');
} else {
    redirectToRoute('/');
}
