<?php
$title = "Profil";
require_once(__DIR__ . "/../partials/head.php");
?>

    <h1><?= $user['pseudo'] ?></h1>
    <p>Inscrit le : <?= $user['registration_date'] ?></p>
    <p>Role : <?= $user['name'] ?></p>
<?php
    if($user['id'] == $_SESSION['user']['idUser'] || $_SESSION['user']['role'] == 'admin') {
        ?>
        <p>Email : <?= $user['mail'] ?></p>
<?php
    }

require_once(__DIR__ . "/../partials/footer.php");
?>
