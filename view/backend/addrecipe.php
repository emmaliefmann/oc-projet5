<?php ob_start(); ?>

<h2>add recipe</h2>

<?php 
var_dump($categories);
?>

<form action="index.php?action=member&page=addrecipe" method="post">
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" />
        <div class="errormessage"></div>
    </div>
    <div>
        <label for="prep-time">Preparation time</label>
        <input type="number" name="prep-time" />
        <div class="errormessage"></div>
    </div>
    <div>
        <label for="category">Category</label>
        <!-- pull from a php table? -->
        <select name="category">
        <option value=""></option>
        <option value="main">Main</option>
        <option value="starter">Starter</option>
        <option value="desert">Desert</option>
        <option value="snack">Snack</option>
        </select>
        <div class="errormessage"></div>
    </div>
    <label for="method">Method</label>
    <textarea name="method"></textarea><br/>

        <input type="submit" value="ENTER">
</form>
<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "Add recipe" ?>
<?php $title = "RecipeApp - Add recipe" ?>
<?php require('view/template.php') ?>
    
<!--<h4>Ingredients</h4>
    <div class="ingredient-input">
        <input type="number" />
        <select name="unit">
            <option value=""></option>
            <option value="grams">grams</option>
            <option value="ml">ml</option>
            <option value="teaspoons">teaspoons</option>
            <option value="tablespoons">tablespoons</option>
            <option value="number">number</option>
        </select>
        <input type="text" name="ingredient" />
    </div>
    <div class="ingredient-input">
        <input type="number" />
        <select name="unit">
            <option value=""></option>
            <option value="grams">grams</option>
            <option value="ml">ml</option>
            <option value="teaspoons">teaspoons</option>
            <option value="tablespoons">tablespoons</option>
            <option value="number">number</option>
        </select>
        <input type="text" name="ingredient" />
    </div>
    <div class="ingredient-input">
        <input type="number" />
        <select name="unit">
            <option value=""></option>
            <option value="grams">grams</option>
            <option value="ml">ml</option>
            <option value="teaspoons">teaspoons</option>
            <option value="tablespoons">tablespoons</option>
            <option value="number">number</option>
        </select>
        <input type="text" name="ingredient" />
    </div>-->