<?php ob_start(); ?>

<h2>Sign up</h2>
<form action="index.php?action=registeruser"method="post" id="registrationForm">
    <label for="username">Username</label><br/>
    <input required type="text" name="username" class="w3-input w3-border" id="registrationUsername"><br/>

    <label for="email">Email</label><br/>
    <input required type="email" name="email" class="w3-input w3-border" id="registrationEmail"><br/>

    <label for="password">Password</label><br/>
    <input required type="password" name="password" class="w3-input w3-border" id="password"><br/>

    <label for="passwordcheck">Confirm Password</label><br/>
    <input required type="password" name="passwordCheck" class="w3-input w3-border" id="passCheck"><br/>
    <input type="submit" value="ENTER" class="emma-button">
</form>
<?php $content = ob_get_clean(); 
$pageTitle = "Create your account"; 
$title = "RecipeApp - create your account"; ?>
<?php require('view/template.php') ?>
    