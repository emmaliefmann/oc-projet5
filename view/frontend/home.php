<php ob_start(); ?>
<div>
</div>
<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "homepage" ?>
<?php $title = "RecipeApp" ?>
<?php require('view/template.php') ?>
    