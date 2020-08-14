<?php ob_start(); ?>
<?php echo $_SESSION['level'];?>
<h2>Dashboard</h2>
<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis laborum a similique dolores, nobis natus tenetur officia distinctio expedita necessitatibus autem doloremque fugiat eveniet. Quos minima veritatis ipsum sed tempore repudiandae illo expedita at molestias eaque quia nobis aut quas nemo temporibus explicabo non repellendus deserunt, itaque quasi soluta? At voluptatem officia consequuntur nostrum corporis ad iure debitis illum, dolorem dolores, reiciendis assumenda neque, adipisci eos! Rerum accusamus dignissimos dolorum quasi, illo explicabo aliquam natus, expedita aut ad magnam magni mollitia? Rerum magni dolorem mollitia, tenetur deleniti minima ex placeat aliquam fugit sint doloribus dolores voluptatibus in facilis tempore molestiae!</p>
<h2>Your recipes</h2>
<ul>
<?php foreach($recipeList as $recipe) { ?>
<li><?=$recipe->getTitle()?></li>
<button class="emma-button"><a href="index.php?action=member&page=changerecipe&id=<?=$recipe->getId()?>">Edit this recipe</a></button>
<?php
}
?>
<h2>Your profile</h2>
<a class="emma-button" href="index.php?action=member&page=changepassword">Change password</a><br>
<?php if($_SESSION['level'] ==="admin") {
    ?>
    <a class="emma-button" href="index.php?action=member&page=admin">ADMIN <i class="fas fa-lock"></i></a>
    <?php
} else {
    return;
}?>
<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "Members page" ?>
<?php $title = "RecipeApp - Your account" ?>
<?php require('view/template.php') ?>
    