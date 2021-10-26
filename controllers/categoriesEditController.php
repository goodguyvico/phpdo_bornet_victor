<?php

if (!empty($_GET['id'])):
    $category = Categories::getCategoryById($dbc, $_GET['id']);
endif;

// Meme gestion d'erreur que pour le formulaire d'ajout.
if (!empty($_POST['valid'])) :
    $errorMsg = [];

//Condition pour verifier si tous les champs sont rempli
    if (empty($_POST["title"]) || empty($_POST["description"]) || empty($_POST["picture"])) :
        $emptyMsg = "Veuillez remplir tous les champs.";
        array_push($errorMsg, $emptyMsg);
    endif;
    //condition pour verifier la longueur du champs Nom
    if (!empty($_POST["title"]) && (strlen($_POST["title"]) < 3 || strlen($_POST["title"]) > 20)) :
        $lengthNameMsg = "Le champ 'Nom' doit comporter entre 3 et 20 caractères.";
        array_push($errorMsg, $lengthNameMsg);
    endif;
    //condition pour verifier la longueur du champs Description
    if (!empty($_POST["description"]) && (strlen($_POST["description"]) < 3 || strlen($_POST["description"])  > 50)) :
        $lengthOriginMsg = "Le champ 'Description' doit comporter entre 3 et 50 caractères.";
        array_push($errorMsg, $lengthOriginMsg);
    endif;
    //condition pour verifier la véracité du champs Parent
    if (!empty($_POST["parent"]) && (($_POST["parent"]) < 8 || ($_POST["parent"])  > 10)) :
        $parentMsg = "Le champ 'Parent' doit être 8, 9 ou 10 selon la categoie parente.";
        array_push($errorMsg, $parentMsg);
    endif;
    //si le tableau d'erreur est OK, alors on ajoute la category
    if (count($errorMsg) == 0 AND !empty($_POST)) :
        Categories::updateCategory($dbc, $_POST['id'],$_POST['title'],$_POST['description'],$_POST['picture'], $_POST['parent']);
        header('Location:index.php?action=categories');
    endif;
endif;

include "views/categoriesForm.php";


