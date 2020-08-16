<?php ob_start(); ?>
<div class="w3-container">
  <h2>OUR RECIPE LIBRARY</h2>
  <p>Welcome to Sharing Table, a cooking community for sharing recipes and meals together. </p><p>We hope you enjoy these recipes created by our community of members.</p><p>Like what you see? Then why not join us! Membership is free.</p> 
</div>  
  <div class="w3-row-padding" id="recipeContainer" >
    <input class="search w3-input" placeholder="search" id="search"/>
    <button id="searchButton" class="emma-button">Search</button>
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
      <ul class="list" id="output">
    <?php 
    foreach($recipes as $recipe) {
        ?> 
      <div class="w3-third w3-section w3-container" >
        <li>
          <div class="w3-card recipe-image">
            <!--recipe-image class removed from div-->
            <!-- <a href="index.php?action=recipe&id=<?=$recipe->getId()?>"> -->
            <img alt="food" class="w3-hover-opacity" 
        <?php if ($recipe->getImage() === NULL) {
          ?>
          src="uploads/recipes/generic.jpg" />
          <?php
        } 
        else {
          ?>
          src="<?=$recipe->getImage()?>" />
          <?php 
        }
        ?>
            <!-- </a> -->
        </div>
        <div class="w3-container recipe-info w3-card">
          <a class="w3-center" href="index.php?action=recipe&id=<?=$recipe->getId()?>"><h5 class="title"><?=$recipe->getTitle()?></h5></a>
          <p class="category invisible"><?=$recipe->getCategory()?></p>
          <button class="w3-button w3-round-xlarge w3-black w3-button w3-tiny authorButton">SharingTable</button>
        </div>
        </li>
      </div>
      
    <?php
    }
    ?>
    <!--function to remove this UL tag then put it back-->
 </ul> 
<div class="w3-center w3-padding-32 w3-bar">
  <ul class="pagination"></ul>
  </div>
</div>
<!-- <h2>SEARCH THE WEB</h2>
<input type="search" id="search"><br><button id="searchButton" class="emma-button">Search the web</button><button id="clear"> clear </button>
<div id="output" class="w3-row-padding"></div>
  
  <ul class="list">
    
  </ul>
  <ul class="pagination"></ul>
</div> -->
<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "All recipes" ?>
<?php $title = "RecipeApp - Recipe Library" ?>
<?php require('view/template.php') ?>
    