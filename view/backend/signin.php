
<?php ob_start(); ?>
<h2>Sign In</h2>
<form action="index.php?action=login" method="post">
    <label for="email">Email</label>
    <input type="email" name="email">
    <label for="password">Password</label>
    <input type="password" name="password">
    <input type="submit" value="ENTER">
</form>
<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "Create your account" ?>
<?php $title = "RecipeApp - create your account" ?>
<?php require('view/template.php') ?>
    