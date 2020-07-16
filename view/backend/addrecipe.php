<?php ob_start(); ?>

<h2>add recipe</h2>
<form action="index.php?action=member&page=addrecipe">
    <label for="username">Username</label>
    <input type="text" name="username">
    <label for="email">Email</label>
    <input type="email" name="email">
    <label for="password">Password</label>
    <input type="password" name="password">
    
    <input type="submit" value="ENTER">
</form>
<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "Add recipe" ?>
<?php $title = "RecipeApp - Add recipe" ?>
<?php require('view/template.php') ?>
    