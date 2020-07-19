<?php ob_start(); ?>


<h2>Edit <?=$recipe->getTitle()?> </h2>

<form action="index.php?action=member&page=editrecipe&id=<?=$recipe->getId()?>" method="post">
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" value="<?=$recipe->getTitle()?>"/>
    </div>
    <div>
        <label for="prep-time">Preparation time</label>
        <input type="number" name="prep-time" value="<?=$recipe->getPrepTime()?>"/>
        <div class="errormessage"></div>
    </div>
    <div>
        <label for="category">Category</label>
        <select name="category">
        <option value=""></option>
        <option value="main">Main</option>
        <option value="starter">Starter</option>
        <option value="desert">Desert</option>
        <option value="snack">Snack</option>
        </select>
        <div class="errormessage"></div>
    </div>
    <div>
        <label for="method">Method</label>
        <textarea name="method"><?=$recipe->getMethod()?></textarea><br/>
    </div>
        <input type="submit" value="Update recipe">
        
        <button><a href="index.php?action=member&page=deletethis&id=<?=$recipe->getId()?>">DELETE</a></button>
        <button>cancel</button>
</form>

<h4>Ingredient List</h4>
<ul>
<?php foreach($ingredientList as $ingredient) {
    ?>
    <li><?=$ingredient->getIngredientName()?></li>
    <?php
}?>
</ul>

<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "Edit your recipe" ?>
<?php $title = $recipe->getTitle() ?>
<?php require('view/template.php') ?>