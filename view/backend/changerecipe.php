<?php ob_start(); ?>


<h2>Edit <?=$recipe->getTitle()?> </h2>

<form action="index.php?action=member&page=editrecipe&id=<?=$recipe->getId()?>" method="post">
    <label for="title">Title</label>
    <input type="text" name="title" class="w3-input w3-border" value="<?=$recipe->getTitle()?>"/>

    <label for="prep-time">Preparation time</label>
    <input type="number" name="prep-time" class="w3-input w3-border" value="<?=$recipe->getPrepTime()?>"/>

    <label for="category">Category</label>
    <select name="category" class="w3-select w3-border">
    <option value=""></option>
    <option value="main">Main</option>
    <option value="starter">Starter</option>
    <option value="desert">Desert</option>
    <option value="snack">Snack</option>
    </select>
    <h5>Ingredient List</h5>
    <ul>
    <?php foreach($recipe->getIngredientList() as $ingredient) {
        ?>
        <li><?=$ingredient->getIngredientName()?></li>
        <?php
    }?>
    </ul>

    <label for="method">Method</label><br/><br/>
    <textarea name="method" class="w3-input w3-border emma-textbox"><?=$recipe->getMethod()?></textarea><br/>

    <input type="submit" value="Update recipe" class="emma-button">
    
    <a class="emma-button" href="index.php?action=member&page=deletethis&id=<?=$recipe->getId()?>">DELETE</a></button>
    <button class="emma-button">cancel</button>
</form>

<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "Edit your recipe" ?>
<?php $title = $recipe->getTitle() ?>
<?php require('view/template.php') ?>