<?php
$aProductCollection = Produits::getList($dbc);

include "views/produitsList.php";