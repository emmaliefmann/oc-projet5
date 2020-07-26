<?php ob_start(); ?>

<form method="post" action="index.php?action=member&page=newpassword">
    <label for="password">Password</label><br/>
    <input required type="password" name="password" id="passwordUpdate" class="emma-button"><br/>

    <label for="passwordcheck">Confirm Password</label><br/>
    <input required type="password" name="passwordCheck" id="passwordUpdateCheck" class="emma-button"><br/>
    <input type="submit" value="ENTER">
</form>
<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "Add recipe" ?>
<?php $title = "RecipeApp - Add recipe" ?>
<?php require('view/template.php') ?>