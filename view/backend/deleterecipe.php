<?php 
    $title = 'Delete recipe'; 
    $question = 'Do you really want to delete your recipe?';
    $id = $_GET['id'];
    $buttonValue = "Delete";
    $formAction = 'index.php?action=member&page=deleterecipe&id=';

?>


<?php require('view/backend/verificationtemplate.php'); ?>