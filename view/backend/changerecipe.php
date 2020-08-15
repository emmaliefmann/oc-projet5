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
        <?php while ($group = $categories->fetch()) {
        $category = $group['category']; ?>
        <option value="<?=$category?>"><?=$category?></option>
        <?php 
        }
        ?>
        </select>
    <h5>Ingredient List</h5>
    
    <?php 
    $ingredient = $recipe->getIngredientList();
    
    for($i=0; $i < count($ingredient); $i++) {
    ?>
         <div class="w3-row-padding ingredientsrow">
             <div class="w3-third">
                <input class="w3-input w3-border" type="number" name="ingredients[<?=$i?>][0]" value=<?=$ingredient[$i]->getQuantity()?>>
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
            <div class="w3-third">
               <input class="w3-input w3-border" type="text" name="ingredients[<?=$i?>][2]"value=<?=$ingredient[$i]->getIngredientName()?>>
           </div>
        </div>
       <?php
     }?>
    <label for="method">Method</label><br/><br/>
    <textarea name="method" class="w3-input w3-border emma-textbox"><?=$recipe->getMethod()?></textarea><br/>

    <input type="submit" value="Update recipe" class="emma-button">
    
    <a class="emma-button" href="index.php?action=member&page=deletethis&id=<?=$recipe->getId()?>">DELETE</a></button>
    <button class="emma-button">cancel</button>
</form>

<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "Edit your recipe" ?>
<?php $title = $recipe->getTitle(); ?>
<?php require('view/template.php'); ?>