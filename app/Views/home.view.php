<?php
global $subject;
$title = "Bienvenue !";
require_once(__DIR__ . "/partials/head.php");

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user']['pseudo'];
    echo '<h1>Bonjour ' . $user . '</h1>';

    if(isset($subject)){
        foreach($subject as $value){
            $idSubject = $value['id'];
            ?>
            <div class="card m-3">
                <div class="card-header">
                    <h5 class="card-title"><?php echo $value['name']?></h5>
                </div>
                <div class="card-body">
                    <p class="card-text"><?php echo $value['description']?></p>
                    <a href="/subject?id=<?php echo $idSubject ?>" class="btn btn-primary">Go voir le sujet</a>
                </div>
            </div>
        <?php
        }
    }
} else { ?>

    <h1>Bienvenue à toi</h1>

<?php }
require_once(__DIR__ . "/partials/footer.php");
?>