<?php ob_start(); ?>

<form method="post" action="index.php?action=member&page=newpassword" id="registrationForm">
    <label for="password">Password</label><br/>
    <input required type="password" name="password" id="password" class="w3-input w3-border"><br/>

    <label for="passwordcheck">Confirm Password</label><br/>
    <input required type="password" name="passwordCheck" id="passCheck" class="w3-input w3-border"><br/>
    <input type="submit" value="ENTER" class="emma-button">
</form>
<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "Add recipe" ?>
<?php $title = "RecipeApp - Add recipe" ?>
<?php require('view/template.php') ?>