<?php 
    $title = 'Delete Comment'; 
    $question = 'Do you really want to delete this comment?';
    $id = $_GET['id'];
    $buttonValue = "Delete";
    $formAction = 'index.php?action=member&page=admin&req=deletecomment&id=';

 require('view/backend/verificationtemplate.php'); ?>