<?php ob_start(); ?>


<h2><?=$recipe->getTitle()?> </h2>

<h4>Preparation time: <?=$recipe->getPrepTime()?></h4>
<h4>Ingredient List</h4>
<ul>
<?php foreach($ingredientList as $ingredient) {
    ?>
    <li><?=$ingredient->getIngredientName()?></li>
    <?php
}?>
</ul>
<h4>Method:</h4>
<p><?=$recipe->getMethod()?></p>

<h4>Comments</h4>
<?php
if (empty($comments)) { ?>
    <p>there are no comments yet</p>
    <?php
} 
else {
    foreach($comments as $comment) {
        ?>  


<div>
<p><strong><?=$comment->getAuthor()?></strong></p>
<p><?=$comment->getComment()?></p>
</div>
<?php
}
}
?>
<form action="index.php?action=addcomment&id=<?= $recipe->getId() ?>" method="post">
    <!-- <div>
        <label for="author">USER</label><br/>
        <input type="text" required id="author" name="author" value="<?=$_SESSION['username']?>"/>
    </div> -->
    <div>
        <label for="comment">comment</label><br/>
        <textarea required name="comment" id="comment" placeholder="your comment"></textarea><br/><br/>
    </div>
    <div>
        <input type="submit" class="newbutton" id="submit-comment" value="COMMENTER"/>
    </div>
</form>

<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "Single recipe" ?>
<!-- Page title could come from information from php -->
<?php $title = $recipe->getTitle() ?>
<?php require('view/template.php') ?>