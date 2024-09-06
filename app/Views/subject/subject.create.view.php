<?php
$title = "Création d'un sujet";
require_once(__DIR__ . "/../partials/head.php");
?>
<h1>Tes admin tu peux créer un nouveau sujet !</h1>
<form method="POST">
    <div class="col-md-4 mx-auto d-block mt-5">
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" name='name'>
        </div>
        <div class="mb-1">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description"></textarea>
        </div>
        <button type="submit" class="btn colorPurpel mt-3">Création du sujet</button>
    </div>
</form>
<?php if (isset($error)) {
    echo "<p class='text-danger'>" . $error . "<p>";
} ?>

<?php
require_once(__DIR__ . "/../partials/footer.php");
?>
