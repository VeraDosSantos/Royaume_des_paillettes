<?php

// si l'utilisateur est connecté alors on le redirige vers la page principale
if (isset($_SESSION['user'])) {
    redirectToRoute('/');
}

if (isset($_POST['email']) && isset($_POST['password'])) {

    // on met les information du formulaire dans des variable
    $mail = $_POST['email'];
    $password = $_POST['password'];

    // verification de la validité de l'email puis de la presence de l'email en bdd
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid Email";
        require_once(__DIR__ . '/../Views/security/login.view.php');
        exit;
    }

    // je recupere mon utilisateur en base de donnee et je les met dans la variable user
    $userQuery = "SELECT * FROM user WHERE mail = :mail";
    $userStatement = $mysqlClient->prepare($userQuery);
    $userStatement->bindParam(':mail', $mail);
    $userStatement->execute();
    // quand l'element est unique on utilise fetch et non fetchAll
    $user = $userStatement->fetch();


    if ($user) {
        if ($password == $user['password']) {
            $_SESSION['user'] = [
                'id' => uniqid(),
                'mail' => $user['mail'],
                'role' => $user['id_role'],
                'pseudo' => $user['pseudo'],
                'idUser' => $user['id'],
            ];
            redirectToRoute('/');
        } else {
            $error = "incorrect Email or Password";
            require_once(__DIR__ . '/../Views/security/login.view.php');
            exit;
        }
    } else {
        $error = "incorrect Email or Password";
    }
}

require_once(__DIR__ . '/../Views/security/login.view.php');