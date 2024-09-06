<?php
$title = "Register";

require_once(__DIR__ . "/../partials/head.php");
?>

<h1>Inscription</h1>

<form method="POST">
    <div class="col-md-4 mx-auto d-block mt-5">
        <div class="mb-3">
            <label for="pseudo" class="form-label">Pseudo</label>
            <input type="text" class="form-control" name='pseudo'>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" name='email'>
            <?php if (isset($error)) {
                echo "<p class='text-danger'>" . $error . "</p>";
            } ?>
        </div>
        <div class="mb-1">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name='password'>
        </div>
        <button type="submit" class="btn colorPurpel mt-3">Connexion</button>
    </div>
</form>

<?php
require_once(__DIR__ . "/../partials/footer.php");
?>
