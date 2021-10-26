<?php

if (!empty($_GET['id'])):
    $product = Produits::getProductsById($dbc, $_GET['id']);
endif;

if (!empty($_POST)) :
    Produits::updateProduct($dbc, $_POST['id'],$_POST['title'], $_POST['description'], $_POST['picture'], $_POST['price'], $_POST['category']);
    header('Location:index.php?action=produits');
endif;

include "views/produitsForm.php";