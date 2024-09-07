<?php

function getSubject(){
    global $mysqlClient;
    $query = "SELECT `id`,`name`, `description`, `creation_date`, `modification_date` FROM `subject`";
    $queryStatement = $mysqlClient->prepare($query);
    $queryStatement->execute();
    return $queryStatement->fetchAll();
}

$subject = getSubject();

require_once(__DIR__ . '/../Views/home.view.php');