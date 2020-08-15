<?php ob_start(); ?>
<h2>OUR RECIPE LIBRARY</h2>
    <div class="w3-row-padding" id="recipeContainer" >
    <input class="search" placeholder="search" />
    <div class="w3-section w3-padding-16">
      <span class="w3-margin-right"><i class="fas fa-utensils w3-margin-right"></i> Filter:</span>
      <button class="w3-button w3-black" id="filter-none">ALL</button>
      <?php
      while ($group = $categories->fetch()) {
        $category = $group['category']?>
      
         <button class="w3-button w3-white filter" id="<?=$category?>">
         <?=$category?>
         <?php 
      }
      ?>
      </div>
      <ul class="list">
    <?php 
    foreach($recipes as $recipe) {
        ?> 
      <div class="w3-third w3-container" >
        <li>
        <a href="index.php?action=recipe&id=<?=$recipe->getId()?>"><img alt="food" class="w3-hover-opacity emma-recipe-image" 
        <?php if ($recipe->getImage() === NULL) {
          ?>
          src="https://source.unsplash.com/400x300/?food" />
          <?php
        } 
        else {
          ?>
          src="<?=$recipe->getImage()?>" />
          <?php 
        }
        ?>
          <!-- <img src="https://source.unsplash.com/400x300/?food" alt="food" class="w3-hover-opacity" /> -->
          </a>
        <div class="w3-container recipe-info">
          <h5 class="title"><?=$recipe->getTitle()?></h5>
          <a href="index.php?action=recipe&id=<?=$recipe->getId()?>">go to recipe</a>
          <p class="category"><?=$recipe->getCategory()?></p>
        </div>
        </li>
      </div>
      
    <?php
    }
    ?>
</ul>
<div class="w3-center w3-padding-32 w3-bar">
  <ul class="pagination"></ul>
  </div>
</div>
<h2>SEARCH THE WEB</h2>
<input type="search" id="search"><br><button id="searchButton" class="emma-button">Search the web</button><button id="clear"> clear </button>
<div id="output" class="w3-row-padding">
  <!--UL for pagination -->
  <ul class="list">
    
  </ul>
  <ul class="pagination"></ul>
</div>
<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "All recipes" ?>
<?php $title = "RecipeApp - Recipe Library" ?>
<?php require('view/template.php') ?>
    