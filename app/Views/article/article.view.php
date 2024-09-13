<?php
$title = "Création d'un sujet";
require_once(__DIR__ . "/../partials/head.php");
?>
<h1><?= $article['title']?></h1>

<p class="float-start">Mise à jour le : <?php echo isset($article['modification_date']) ? $article['modification_date'] : $article['creation_date']?></p>
<p class="float-end">Créer par : <?=$article['pseudo']?></p>
<p><?=$article['description']?></p>
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
    ?>
        <div class="card m-5">
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>Le commentaire</p>
                    <footer class="blockquote-footer">Pseudo <cite title="Source Title">date</cite></footer>
                </blockquote>
            </div>
        </div>

        <form class="mt-5" method="POST">
            <div class="col-md-4 mx-auto d-block mt-5">
            <div class="form-floating">
                <textarea class="form-control" id="description" style="height: 100px"></textarea>
                <label for="description">Commentaire</label>
            </div>
            <button type="submit" class="btn btn-comment">Submit</button>
            </div>
        </form>
<?php
require_once(__DIR__ . "/../partials/footer.php");
?>
