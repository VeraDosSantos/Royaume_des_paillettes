<?php
if($_SESSION['user']['role'] == 'admin'){

    function getUsers(){
        global $mysqlClient;
        $query = "SELECT `user`.`id`, `user`.`pseudo`, `user`.`mail`, `user`.`registration_date`
        FROM `user` WHERE `user`.`id_role` = 2";
        $queryStatement = $mysqlClient->prepare($query);
        $queryStatement->execute();
        return $queryStatement->fetchAll();
    }
    function getAdmins(){
        global $mysqlClient;
        $query = "SELECT `user`.`id`, `user`.`pseudo`, `user`.`mail`, `user`.`registration_date`
        FROM `user` WHERE `user`.`id_role` = 1";
        $queryStatement = $mysqlClient->prepare($query);
        $queryStatement->execute();
        return $queryStatement->fetchAll();
    }

    $users = getUsers();
    $admins = getAdmins();

    require_once(__DIR__ . '/../Views/user/allUsers.view.php');
}