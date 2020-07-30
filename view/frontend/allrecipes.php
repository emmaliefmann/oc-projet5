<?php ob_start(); ?>

<h2>ALL RECIPES</h2>
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
<button class="sort" data-sort="title">title</button>
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
        <div class="w3-container w3-white">
          <h5 class="title"><?=$recipe->getTitle()?></h5>
          <a href="index.php?action=recipe&id=<?=$recipe->getId()?>">go to recipe</a>
          <p class="description">
            Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum,
            porta lectus vitae, ultricies congue gravida diam non fringilla.
          </p>
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
<!-- <div class="w3-center w3-padding-32"> 
    <div class="w3-bar">
      <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
      <a href="#" class="w3-bar-item w3-black w3-button">1</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
    </div>
  </div> -->
<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "All recipes" ?>
<?php $title = "RecipeApp - Space" ?>
<?php require('view/template.php') ?>
    