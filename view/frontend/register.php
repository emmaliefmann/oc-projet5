<?php ob_start(); ?>

<h2>Sign up</h2>
<form action="">
    <label for="username">Username</label>
    <input type="text" name="username">
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
    