<?php ob_start(); ?>
<h2 class="w3-center">Dashboard</h2>
<div class="w3-card-4 w3-section">
    <h2 class="w3-container w3-light-grey">Your profile</h2>
    <div class="w3-container">
        <img class="w3-left w3-circle avatar" alt="avatar" src="public/images/avatar.png">  
        <p>You have published <?=count($recipeList)?> recipes.</p>
        <a class="emma-button" href="index.php?action=member&page=changepassword">Change password</a><br>
    </div>
</div>
<?php if($_SESSION['level'] ==="admin") {
    ?>
    <a class="emma-button" href="index.php?action=member&page=admin">ADMIN <i class="fas fa-lock"></i></a>
    <?php
} ?>
<div class="w3-container w3-section">
    <h2>Edit your recipes</h2>
    <?php if(count($recipeList)===0) {
        ?>
    <p>You don't have any recipes yet! Why not add one to our library?</p>
    <a href="index.php?action=member&page=newrecipe" class="emma-button">Add recipe</a><br>
    <a href="index.php?action=member&page=newrecipe"><img src="public/images/recipebook.jpg" alt="recipe book" class="image-dimension"/></a>    
</div>
        
        <?php
    } else { ?>

    <ul class="w3-ul w3-border dashboard-list">
    <?php
    foreach($recipeList as $recipe) { ?>
        <li class="w3-bar">
            <h5 class="w3-bar-item"><?=$recipe->getTitle()?></h5>
            <span class="w3-bar-item w3-large w3-right">
                <a href="index.php?action=member&page=changerecipe&id=<?=$recipe->getId()?>"><i class="far fa-edit fa-2x"></i></a>
            </span>
        </li>
    
        <?php
        }
        }?>
    </ul>
</div>


<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "Members page" ?>
<?php $title = "RecipeApp - Your account" ?>
<?php require('view/template.php'); ?>
    