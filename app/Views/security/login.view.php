<?php
$title = "login";

require_once(__DIR__ . "/../partials/head.php");
?>

    <form action="" method="POST">
        <div>
            <label for="email">email</label>
            <input type="email" name='email'>
        </div>
        <div>
            <label for="password">Mot de passe</label>
            <input type="password" name='password'>
        </div>
        <button type='submit' class='btn btn-primary'>Connexion</button>
    </form>
<?php if (isset($error)) {
    echo "<p class='text-danger'>" . $error . "<p>";
} ?>


<?php
require_once(__DIR__ . "/../partials/footer.php");
