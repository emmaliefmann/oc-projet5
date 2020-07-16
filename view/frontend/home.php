<php ob_start(); ?>

<h2>homepage</h2>
<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "homepage" ?>
<?php $title = "RecipeApp" ?>
<?php require('view/template.php') ?>
    