
<?php ob_start(); ?>
<h2>Sign In</h2>
<form action="index.php?action=login" method="post">
    <label for="email">Email</label>
    <input type="email" class="w3-input w3-border"name="email"><br/>
    <label for="password">Password</label>
    <input type="password" name="password" class="w3-input w3-border">
    <input type="submit" value="ENTER" class="emma-button">
</form>
<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "Create your account" ?>
<?php $title = "RecipeApp - create your account" ?>
<?php require('view/template.php') ?>
    