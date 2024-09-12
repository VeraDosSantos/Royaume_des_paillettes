<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title ? $title : '' ?>
    </title>
    <script src="https://kit.fontawesome.com/f5a1d28d53.js" crossorigin="anonymous"></script>
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
            <?php
            if (isset($_SESSION['user'])) { ?>
                    <?php if ($_SESSION['user']['role'] == 'admin') { ?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/subject-create"><i class="fa-solid fa-book"></i> Sujets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/users"><i class="fa-solid fa-users"></i> Membres</a>
                </li>
                <?php
            } ?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/profile?id=<?= $_SESSION['user']['idUser'] ?>"><i class="fa-solid fa-user"></i> Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/logout"><i class="fa-solid fa-circle-xmark"></i> Déconnexion</a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/login"><i class="fa-solid fa-circle-play"></i> Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/register"><i class="fa-solid fa-circle-plus"></i> Inscription</a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>
<div class="myBody">