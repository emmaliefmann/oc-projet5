<?php ob_start(); ?>


<h2>Edit <?=$recipe->getTitle()?> </h2>
<form action="index.php?action=member&page=editrecipe&id=<?=$recipe->getId()?>" method="post" id="edit-recipe">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="w3-input w3-border form-control" maxlength="200" required value="<?=$recipe->getTitle()?>"/>
    </div>
    <div class="form-group">
        <label for="prep-time">Preparation time</label>
        <input type="number" name="prep-time" class="w3-input w3-border form-control" required value="<?=$recipe->getPrepTime()?>"/>
    </div>
    <div class="form-group">
        <label for="category">Category</label>
        <select name="category" class="w3-select w3-border form-control" required>
        <option value=""></option>
            <?php while ($group = $categories->fetch()) {
            $category = $group['category']; ?>
            <option value="<?=$category?>"><?=$category?></option>
            <?php 
            }
            ?>
            </select>
    </div>
    <h4 class="w3-center">Ingredient List</h4>
    <div id="ingredient-container">
    <div class="w3-center">
            <div id="addIng" class="small-button">+</div>
            <div id="removeIng" class="small-button">-</div>
        </div>
        <?php 
        $ingredient = $recipe->getIngredientList();
        
        for($i=0; $i < count($ingredient); $i++) {
        ?>
            <div class="w3-row-padding ingredientsrow">
                <div class="w3-third form-group">
                    <input class="w3-input w3-border form-control" type="number" required name="ingredients[<?=$i?>][0]" value=<?=$ingredient[$i]->getQuantity()?>>
                </div>
                <div class="w3-third">
                    <select class="w3-select w3-border" name="ingredients[<?=$i?>][1]">
                        <option value="" selected></option>
                        <option value="grams">grams</option>
                        <option value="ml">ml</option>
                        <option value="tablespoons">tablespoons</option>
                        <option value="teaspoons">teaspoons</option>
                </select>
                </div>
                <div class="w3-third form-group">
                <input class="w3-input w3-border form-control" required type="text" name="ingredients[<?=$i?>][2]"value=<?=$ingredient[$i]->getIngredientName()?>>
            </div>
            </div>
        <?php
        }?>
     </div>
     <div class="form-group">
        <label for="method">Method</label><br/><br/>
        <textarea name="method" required class="w3-input w3-border form-control emma-textbox"><?=$recipe->getMethod()?></textarea><br/>
     </div>
    <input type="submit" value="Update recipe" class="emma-button">
    
    <a class="emma-button" href="index.php?action=member&page=deletethis&id=<?=$recipe->getId()?>">DELETE</a></button>
    <button class="emma-button">cancel</button>
</form>

<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "Edit your recipe" ?>
<?php $title = $recipe->getTitle(); ?>
<?php require('view/template.php'); ?>