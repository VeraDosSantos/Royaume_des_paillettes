<?php
$title = "Bienvenue !";
require_once(__DIR__ . "/partials/head.php");

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user']['pseudo'];
    echo '<h1>Bonjour ' . $user . '</h1>';
    ?>
    <button type="button" class="btn btn-success"><a href="/createArticle">Ajouter</a></button>
    <?php
} else { ?>

    <h1>Bienvenue à toi</h1>

<?php }
require_once(__DIR__ . "/partials/footer.php");
?>