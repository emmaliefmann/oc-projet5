<?php ob_start(); ?>


<h2><?=$recipe->getTitle()?> </h2>

<h4>Preparation time: <?=$recipe->getPrepTime()?></h4>
<h4>Ingredient List</h4>
<ul>
<?php foreach($ingredientList as $ingredient) {
    ?>
    <li><?=$ingredient->getIngredientName()?></li>
    <?php
}?>
</ul>
<h4>Method:</h4>
<p><?=$recipe->getMethod()?></p>
<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "Single recipe" ?>
<!-- Page title could come from information from php -->
<?php $title = $recipe->getTitle() ?>
<?php require('view/template.php') ?>