<?php
$title = "Création d'un sujet";
require_once(__DIR__ . "/../partials/head.php");
?>
    <h1>Création d'un article</h1>
    <form method="POST">
        <div class="col-md-4 mx-auto d-block mt-5">
            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" class="form-control" name='title'>
            </div>
            <div class="mb-1">
                <label for="text" class="form-label">Dit moi plus</label>
                <textarea class="form-control" name="text"></textarea>
            </div>
            <button type="submit" class="btn colorPurpel mt-3">Création du sujet</button>
        </div>
    </form>
<?php
require_once(__DIR__ . "/../partials/footer.php");
?>