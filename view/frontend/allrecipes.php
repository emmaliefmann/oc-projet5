<?php ob_start(); ?>

<h2>successful login up</h2>

<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "Your account" ?>
<?php $title = "RecipeApp - Space" ?>
<?php require('view/template.php') ?>
    