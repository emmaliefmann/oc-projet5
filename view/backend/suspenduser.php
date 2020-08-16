<?php 
    $title = 'Suspend user'; 
    $question = 'Do you really want to suspend access for this user?';
    $id = $_GET['id'];
    $buttonValue = "Suspend";
    $formAction = 'index.php?action=member&page=admin&req=suspendaccess&id=';
require('view/backend/verificationtemplate.php'); ?>