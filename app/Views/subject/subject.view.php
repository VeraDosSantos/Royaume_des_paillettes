<?php
$title = "Création d'un sujet";
require_once(__DIR__ . "/../partials/head.php");
?>
<h1>Hello</h1>
    <button type="button" class="btn btn-warning mx-auto d-block p-1"><a href="/article-create?subject=1" class="text-light">Créer un article</a></button>
<?php
    if(isset($articles) && count($articles) > 0){
    foreach($articles as $article){
    ?>
    <div class="card m-5">
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p><?= $article['title']?></p>
                <button type="button" class="btn btn-danger m-2 mb-4"><a href="/article?id=<?= $article['id']?>" class="text-light">🐬Voir +</a></button>
                <p class="blockquote-footer">Créer le : <?php echo isset($article['modification_date']) ? $article['modification_date'] : $article['creation_date']?></p>
            </blockquote>
        </div>
    </div>
        <?php
    }
} else { ?>

    <h1>Il n'y a pas encore d'articles ici</h1>

<?php }
require_once(__DIR__ . "/../partials/footer.php");
?>