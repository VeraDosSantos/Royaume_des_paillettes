<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        // si la variable title existe alors on affiche le contenue
        if (isset($title)) {
            echo $title;
        } ?>
    </title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/style.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light text-white">
    <div class="container-fluid">
        <a class="navbar-brand mt-2 mt-lg-0 text-white" href="/">
            <img src="/public/img/Icon.png" alt="Logo" class="imgLogo">
            Royaume des Paillettes
        </a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white">
            <?php if (isset($_SESSION['user'])) { ?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/logout">Déconnexion</a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/login">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/register">Inscription</a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>
<div class="myBody">