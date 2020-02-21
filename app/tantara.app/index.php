<?php
define('ROOT', __DIR__);
// var_dump(ROOT . '/app/App.php');
// die();
require ROOT . '/app/App.php';
App::load();

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'posts.accueil';
}

//gestion des routes
$page = explode('.', $page);
$action = $page[1];
if ($page[0] === 'admin') {
    $controller = '\App\Controller\Admin\\' . ucfirst($page[1]) . 'Controller';
    $action = $page[2];
} else {
    $controller = '\App\Controller\\' . ucfirst($page[0]) . 'Controller';
}
$controller = new $controller();
$controller->$action();
