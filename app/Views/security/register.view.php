<?php
$title = "Register";

require_once(__DIR__ . "/../partials/head.php");
?>
<h1>register</h1>

<form action="/register" method='POST'>
    <div>
        <label for="pseudo">Pseudo</label>
        <input type="text" name='pseudo'>
    </div>
    <div>
        <label for="email">email</label>
        <input type="text" name='email'>
        <?php if (isset($error)) {
            echo "<p class='text-danger'>" . $error . "</p>";
        } ?>
    </div>
    <div>
        <label for="password">Mot de passe</label>
        <input type="password" name='password'>
    </div>
    <button type="submit">Register</button>
</form>

<?php
require_once(__DIR__ . "/../partials/footer.php");
?>
