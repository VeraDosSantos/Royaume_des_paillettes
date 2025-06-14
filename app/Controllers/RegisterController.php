<?php

// on verifie que le formulaire a ete envoyé
global $mysqlClient;
if (isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password'])) {
    // on met les information du formulaire dans des variable
    $pseudo = $_POST['pseudo'];
    $mail = $_POST['email'];
    $password = $_POST['password'];
    $registration_date = date('Y-m-d');
    $role = 2;

    // verification de la validité de l'email puis de la presence de l'email en bdd
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $error = "Adresse e-mail pas correcte.";
        require_once(__DIR__ . '/../Views/security/register.view.php');
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
        $error = "L'adresse e-mail existe déjà !";
    } else {
        $passwordValid = preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/", $password);

        if ($passwordValid) {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $userQuery = "INSERT INTO `user` (`pseudo`,`mail`,`password`, `registration_date`, `id_role`) VALUES (:pseudo, :mail, :password, :registration_date, :role)";
            // je prepare ma requete sql a l'envoie
            $userStatement = $mysqlClient->prepare($userQuery);
            //  je modifie les valeurs de ma requete en fonction des valeurs du formulaire
            $userStatement->bindParam(':pseudo', $pseudo);
            $userStatement->bindParam(':mail', $mail);
            $userStatement->bindParam(':password', $passwordHash);
            $userStatement->bindParam(':registration_date', $registration_date);
            $userStatement->bindParam(':role', $role);

            // j'execute la requete
            $userStatement->execute();

            // je redirige l'utilisateur vers la page login
            redirectToRoute('/login');
        } else {
            $error = "
            - au moins 8 caractères <br>
            - au moins un caractère en majuscule <br>
            - au moins un caractère en minuscule<br>
            - au moins un chiffre<br>
            - au moins un caractère spécial<br>";
        }
    }
}

require_once(__DIR__ . '/../Views/security/register.view.php');