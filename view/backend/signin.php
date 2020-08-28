
<?php ob_start(); ?>
<h2>Sign In</h2>
<div class="w3-card-4 w3-container emma-card">
    <h3>New user?</h3>
    <p>You can create your profile and start contributing to this community now!<p>
        <a class="emma-button" href="index.php?action=register">Create an account</a>
</div>
<form action="index.php?action=login" method="post" class="w3-container w3-padding-48">
    <label for="email">Email</label>
    <input type="email" class="w3-input w3-border" id="email" name="email"><br/>
    <label for="password">Password</label>
    <input type="password" name="password" id="password" class="w3-input w3-border">
    <input type="submit" value="ENTER" class="emma-button">
</form>
<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "Create your account" ?>
<?php $title = "RecipeApp - create your account" ?>
<?php require('view/template.php') ?>
    