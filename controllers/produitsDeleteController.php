<?php
if(!empty($_GET['id'])):
    Produits::delete($dbc, $_GET['id']);
    header('Location:index.php?action=produits');
endif;
