<?php
$title = "Les membres";
require_once(__DIR__ . "/../partials/head.php");
?>

    <h1 class="mt-4 mb-4">Les membres</h1>
<?php
if(isset($users)){
    ?>
    <div class="list-group col-4 mx-auto d-block">
    <?php
        foreach($users as $user){
            ?>
                <a href="/profile?id=<?= $user['id'] ?>" class="list-group-item list-group-item-action"><?= $user['pseudo']?></a>
        <?php
        }
    ?>
    </div>
<?php
}
?>
    <h2 class="mt-4 mb-4">Les admins</h2>
<?php
if(isset($admins)){
    ?>
    <div class="list-group col-4 mx-auto d-block">
    <?php
        foreach($admins as $admin){
            ?>
                <a href="/profile?id=<?= $admin['id'] ?>" class="list-group-item list-group-item-action"><?= $admin['pseudo']?></a>
        <?php
        }
    ?>
    </div>
<?php
}

require_once(__DIR__ . "/../partials/footer.php");
?>
