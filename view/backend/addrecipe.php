<?php ob_start(); ?>

<h2>Add recipe</h2>
<form action="index.php?action=member&page=addrecipe" method="post" id="addRecipeForm">
    
    <div class="form-group">    
        <label for="title">Title</label>
        <input type="text" class="w3-input w3-border form-control" name="title" maxlength="200" required />
    </div>    
    <div class="form-group">
        <label for="prep-time">Preparation time</label>
        <input type="number" class="w3-input w3-border form-control" min="0" name="prep-time" required />
    </div>
    <div class="form-group">
        <label for="image">Image</label><br/>
        <input type="file" class="w3-input w3-border" id="inpFile" name="files">
    </div>
    <input name="image" id="filename" type="text" class="invisible"></input><br>
    <div class="form-group">
        <label for="category">Category</label>
        <select class="w3-select w3-border" name="category" required>
        <option value=""></option>
        <?php while ($group = $categories->fetch()) {
        $category = $group['category']; ?>
        <option value="<?=$category?>"><?=$category?></option>
        <?php 
        }
        ?>
        </select>
    </div>
    <h4 class="w3-center">Ingredients</h4>   
    <div id="ingredient-container">
        <!--javacript generates fields-->
        <div class="w3-center">
            <div id="addIng" class="small-button">+</div>
            <div id="removeIng" class="small-button">-</div>
        </div>
    </div>
    <div class="form-group">
        <label for="method">Method</label><br/>
        <textarea name="method" class="w3-input w3-border emma-textbox form control" required=""></textarea><br/>
    </div>

    <input type="submit" value="Add Recipe" class="emma-button" />
    
<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "Add recipe" ?>
<?php $title = "Sharing Table - Add recipe" ?>
<?php require('view/template.php') ?>