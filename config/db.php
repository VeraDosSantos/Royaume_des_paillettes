<?php
// Je me connecte a la base de donnee

try {
    $mysqlClient = new PDO('mysql:host=localhost;dbname=unicorn_forum;charset=utf8', 'root');
} catch (Exception $e) {
    die('ERREUR : ' . $e->getMessage());
}
