<?php
if(isset($_GET['id'])){
    $idUser = $_GET['id'];
    function getUser($value){
        global $mysqlClient;
        $query = "SELECT `user`.`id`, `user`.`pseudo`, `user`.`mail`, `user`.`registration_date`, `user`.`id_role`, `role`.`name` 
        FROM `user`
        INNER JOIN `role` ON `user`.`id_role` = `role`.`id` 
        WHERE `user`.`id` = :idUser";
        $queryStatement = $mysqlClient->prepare($query);
        $queryStatement->bindValue(':idUser', $value);
        $queryStatement->execute();
        return $queryStatement->fetch();
    }

    $user = getUser($idUser);

    require_once(__DIR__ . '/../Views/user/user.view.php');
}