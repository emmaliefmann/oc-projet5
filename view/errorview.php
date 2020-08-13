<php ob_start(); ?>

<h2>Error</h2>
<h3><?=$errorMessage?></h3>
<a href="index.php?action=allrecipes" class="emma-button">Go back</a>
<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "Error" ?>
<?php $title = "An error has occured" ?>
<?php require('view/template.php') ?>
    