<?php
$title = "Création d'un sujet";
require_once(__DIR__ . "/../partials/head.php");
?>
<h1><?= $article['title']?></h1>
<p><?=$article['description']?></p>
<p>Mise à jour le : <?php echo isset($article['modification_date']) ? $article['modification_date'] : $article['creation_date']?></p>
<p>Créer par : <?=$article['pseudo']?></p>
<button type="button" class="btn colorPurpel"><a href="/subject?id=<?= $article['id_subject'] ?>" class="text-light">Retour</a></button>
<?php
    if($article['id_user'] == $_SESSION['user']['idUser']){
?>
        <button type="button" class="btn colorPurpel"><a href="/article-edit?id=<?= $article['id'] ?>" class="text-light">Modifier mon article</a></button>
<?php
    }
    if($article['id_user'] == $_SESSION['user']['idUser'] || $_SESSION['user']['role'] == 'admin'){
?>
        <form action="" method="POST">
            <input type="hidden" id="idDelete" name="idDelete" value="<?= $article['id'] ?>">
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
<?php
}
require_once(__DIR__ . "/../partials/footer.php");
?>
