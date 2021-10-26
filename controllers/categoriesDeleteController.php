<?php
if(!empty($_GET['id'])):
    Categories::delete($dbc, $_GET['id']);
    header('Location:index.php?action=categories');
endif;
