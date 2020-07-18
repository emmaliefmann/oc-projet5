<?php ob_start(); ?>

<h2>ALL RECIPES</h2>
<ul>
<?php 
foreach($recipes as $recipe) {
    ?>
<li><a href="index.php?action=recipe&id=<?=$recipe->getId()?>"><?=$recipe->getTitle()?></a></li>
    <?php
}
?>
</ul>
<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "Your account" ?>
<?php $title = "RecipeApp - Space" ?>
<?php require('view/template.php') ?>
    