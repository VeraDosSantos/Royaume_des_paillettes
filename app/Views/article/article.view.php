<?php
$title = "Création d'un sujet";
require_once(__DIR__ . "/../partials/head.php");
?>
<h1><?=$article['title']?></h1>
<p><?=$article['text']?></p>
<p>Mise à jour le : <?php echo isset($article['modification_date']) ? $article['modification_date'] : $article['creation_date']?></p>
<p>Créer par : </p>
<?php
require_once(__DIR__ . "/../partials/footer.php");
?>
