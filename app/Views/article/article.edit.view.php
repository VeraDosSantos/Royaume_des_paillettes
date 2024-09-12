<?php
$title = "Modifier mon article";
require_once(__DIR__ . "/../partials/head.php");
?>
    <h1>Modification d'un article</h1>
    <form method="POST">
        <div class="col-md-4 mx-auto d-block mt-5">
            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" class="form-control" name='title' value="<?= $resultArticle['title']?>">
            </div>
            <div class="mb-1">
                <label for="description" class="form-label">Dit moi plus</label>
                <textarea class="form-control" name="description"><?= $resultArticle['description']?></textarea>
            </div>
            <button type="submit" class="btn colorPurpel mt-3">Modifier mon article</button>
            <button type="button" class="btn colorPurpel"><a href="/article?id=<?= $resultArticle['id'] ?>" class="text-light">Annuler</a></button>
        </div>
    </form>
<?php
require_once(__DIR__ . "/../partials/footer.php");
?>