<?php

$role = $_SESSION['user']['role'];

if ($role === 'admin') {
    require_once(__DIR__ . '/../Views/subject/subject.create.view.php');
} else {
    redirectToRoute('/');
}
