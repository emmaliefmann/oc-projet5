<?php ob_start();
?>
<div class="w3-row">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
     <img src="https://source.unsplash.com/600x750/?food" class="w3-round w3-image w3-opacity-min" alt="Table Setting">
    </div>

    <div class="w3-col m6 w3-padding-large">
      <h2 class="w3-center"><?=$recipe->getTitle()?></h2><br>
      <h5 class="w3-center">Ingredients</h5>
      <ul class="w3-ul">
        <?php foreach($recipe->getIngredientList() as $ingredient) {
            ?>
            <li><?=$ingredient->getQuantity()?> <?=$ingredient->getUnit()?> <?=$ingredient->getIngredientName()?></li>
            <?php
        }?>
        </ul>
      <p class="w3-large">Lorem ipsum dolor sit amet, consectetur adipiscing elit consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute iruredolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
      <p><?=$recipe->getMethod()?></p>
    </div>
  </div>
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
    <div>
        <label for="comment">Your comment</label><br/>
        <textarea name="comment" id="comment" placeholder="your comment" class="w3-input w3-border emma-textbox" ></textarea><br/><br/>
    </div>
    <div>
        <input type="submit" class="emma-button" id="submit-comment" value="COMMENTER"/>
    </div>
</form>

<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "Single recipe" ?>
<?php $title = $recipe->getTitle() ?>
<?php require('view/template.php') ?>