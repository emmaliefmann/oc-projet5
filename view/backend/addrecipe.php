<?php ob_start(); ?>

<h2>Add recipe</h2>

<?php 
while ($group = $categories->fetch()) {
    $category = $group['category']; 
    //loop through for category drop down menu 
}

?>

<form action="index.php?action=member&page=addrecipe" method="post">
    
        <label for="title">Title</label>
        <input type="text" class="w3-input w3-border" name="title" />
        
    
        <label for="prep-time">Preparation time</label>
        <input type="number" class="w3-input w3-border" name="prep-time" />
        
    
        <label for="category">Category</label>
        <!-- pull from a php table? -->
        <select class="w3-select w3-border" name="category">
        <option value=""></option>
        <option value="main">Main</option>
        <option value="starter">Starter</option>
        <option value="desert">Desert</option>
        <option value="snack">Snack</option>
        </select>
        
    
    <h4>Ingredients</h4>
    <div class="w3-row-padding">
        <div class="w3-third">
            <input type="number" class="w3-input w3-border" name="quantity"/>
        </div>
        <div class="w3-third">
            <select name="unit" class="w3-select w3-border" >
                <option value=""></option>
                <option value="grams">grams</option>
                <option value="ml">ml</option>
                <option value="teaspoons">teaspoons</option>
                <option value="tablespoons">tablespoons</option>
                <option value="number">number</option>
            </select>
        </div>
        <div class="w3-third">
            <input type="text" name="ingredient" class="w3-input w3-border"/>
        </div>
    </div>
    <label for="method">Method</label><br/>
    <textarea name="method" class="w3-input w3-border emma-textbox"></textarea><br/>


    <input type="submit" value="Add Recipe" class="emma-button" />
    
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