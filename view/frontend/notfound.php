<?php ob_start(); ?>
<div class="w3-container w3-center">
    <h2>Opps! We cannot find your recipe</h2>
    <p>It might have been moved or deleted.</p>
    
    <a class="emma-button" href="index.php?action=allrecipes">Homepage</a>
    <a class="emma-button" href="index.php?action=member&page=newrecipe">Add recipe</a>
    <br> 
    <a href="index.php?action=allrecipes">
        <img src="public/images/rolling.jpg" class="image-dimension" alt="rolling pin" />
    </a>
</div>
<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "Members page" ?>
<?php $title = "RecipeApp - Administration" ?>
<?php require('view/template.php') ?>