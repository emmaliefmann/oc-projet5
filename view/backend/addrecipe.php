<?php ob_start(); ?>

<h2>Add recipe</h2>

<form action="index.php?action=member&page=addrecipe" method="post" id="addRecipeForm">
    
        <label for="title">Title</label>
        <input type="text" class="w3-input w3-border" name="title" />
        
    
        <label for="prep-time">Preparation time</label>
        <input type="number" class="w3-input w3-border" name="prep-time" />
        <label for="category">Category</label>
        <select class="w3-select w3-border" name="category">
        <option value=""></option>
        <?php while ($group = $categories->fetch()) {
        $category = $group['category']; ?>
        <option value="<?=$category?>"><?=$category?></option>
        <?php 
        }
        ?>
        </select>
    <h4>Ingredients</h4>
    
    <div id="ingredient-container">
        
    </div>
    
    <label for="method">Method</label><br/>
    <textarea name="method" class="w3-input w3-border emma-textbox"></textarea><br/>


    <input type="submit" value="Add Recipe" class="emma-button" />
    
<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "Add recipe" ?>
<?php $title = "RecipeApp - Add recipe" ?>
<?php require('view/template.php') ?>