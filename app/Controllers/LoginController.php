<?php

// si l'utilisateur est connecté alors on le redirige vers la page principale
if (isset($_SESSION['user'])) {
    redirectToRoute('/');
}

if (isset($_POST['email']) && isset($_POST['password'])) {

    // on met les informations du formulaire dans des variables
    $mail = $_POST['email'];
    $password = $_POST['password'];

    // verification de la validité de l'email puis de la presence de l'email en bdd
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid Email";
        require_once(__DIR__ . '/../Views/security/login.view.php');
        exit;
    }

    // je recupere mon utilisateur en base de donnee et je les met dans la variable user
    $userQuery = "SELECT * FROM `user` WHERE `mail` = :mail";
    $userStatement = $mysqlClient->prepare($userQuery);
    $userStatement->bindParam(':mail', $mail);
    $userStatement->execute();
    // quand l'element est unique on utilise fetch et non fetchAll
    $user = $userStatement->fetch();


    if ($user) {
        if (password_verify($password, $user['password'])) {

            $roleUser = $user['id_role'];

            $userQuery = "SELECT * FROM `role` WHERE `id` = :id_role";
            $userStatement = $mysqlClient->prepare($userQuery);
            $userStatement->bindParam(':id_role', $roleUser);
            $userStatement->execute();
            $myUser = $userStatement->fetch();
            $_SESSION['user'] = [
                'id' => uniqid(),
                'mail' => $user['mail'],
                'pseudo' => $user['pseudo'],
                'idUser' => $user['id'],
                'role' => $myUser['name'],
            ];

            redirectToRoute('/');
        } else {
            $error = "L'e-mail ou le mot de passe sont incorrecte !";
            require_once(__DIR__ . '/../Views/security/login.view.php');
            exit;
        }
    } else {
        $error = "L'e-mail ou le mot de passe sont incorrecte !";
    }
}

require_once(__DIR__ . '/../Views/security/login.view.php');