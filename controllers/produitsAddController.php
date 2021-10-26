<?php
if (!empty($_POST) AND (!empty($_POST['valid']))):
    $errorMsg = [];
//Condition pour verifier si tous les champs sont rempli
    if (empty($_POST["title"]) || empty($_POST["description"]) || empty($_POST["picture"]) || empty($_POST["price"]) || empty($_POST["category"])) :
        $emptyMsg = "Veuillez remplir tous les champs.";
        array_push($errorMsg, $emptyMsg);
    endif;
    //condition pour verifier la longueur du champs Nom
    if (!empty($_POST["title"]) && (strlen($_POST["title"]) < 3 || strlen($_POST["title"]) > 20)) :
        $lengthTitleMsg = "Le champ 'Nom' doit comporter entre 3 et 20 caractères.";
        array_push($errorMsg, $lengthTitleMsg);
    endif;
    //condition pour verifier la longueur du champs Description
    if (!empty($_POST["description"]) && (strlen($_POST["description"]) < 3 || strlen($_POST["description"])  > 50)) :
        $lengthDescriptionMsg = "Le champ 'Description' doit comporter entre 3 et 50 caractères.";
        array_push($errorMsg, $lengthDescriptionMsg);
    endif;
    // Il y'a sans doute mieux pour gerer ce parametre ...
    if (!empty($_POST["category"]) && (($_POST["category"]) < 8 || ($_POST["category"])  > 16)) :
        $categoryMsg = "Le champ 'Parent' doit être compris entre  8 et 16 selon la categoie.";
        array_push($errorMsg, $categoryMsg);
    endif;
    // Verification que le prix soit un nombre et superieur a 0
    if (isset($_POST["price"]) && (!is_numeric($_POST["price"]) || $_POST["price"] <= 0)) :
        $priceErrorMsg = "Le champ 'Prix' doit être un nombre supérieur à 0.";
        array_push($errorMsg, $priceErrorMsg);
    endif;
    //si le tableau d'erreur est OK, alors on ajoute la category
    if (count($errorMsg) == 0 AND !empty($_POST['valid'])) :
        Produits::addProduct($dbc, $_POST['title'],$_POST['description'],$_POST['picture'],$_POST['price'], $_POST['category']);
        header('Location:index.php?action=produits');
    endif;
endif;


require_once "views/produitsForm.php";