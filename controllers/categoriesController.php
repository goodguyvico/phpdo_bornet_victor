<?php
$aCategoryCollection = Categories::getList($dbc);

include "views/categoriesList.php";