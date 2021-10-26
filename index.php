<?php

include "views/header.php";

spl_autoload_register(function ($class) {
    require "models/$class.php";

});
$dbc = new Database();

if (!empty($_GET)):
    switch ($_GET['action']):
        case 'categories':
            include('controllers/categoriesController.php');
            break;
        case 'categoryEdit':
            include('controllers/categoriesEditController.php');
            break;
        case 'categoryAdd':
            include('controllers/categoriesAddController.php');
            break;
        case 'categoryDelete':
            include('controllers/categoriesDeleteController.php');
            break;
        case 'produits':
            include('controllers/produitsController.php');
            break;
        case 'produitsEdit':
            include('controllers/produitsEditController.php');
            break;
        case 'produitsAdd':
            include('controllers/produitsAddController.php');
            break;
        case 'produitsDelete':
            include('controllers/produitsDeleteController.php');
            break;
    endswitch;
endif;
