<?php ob_start(); ?>
<div class="w3-container">
  <h2>OUR RECIPE LIBRARY</h2>
  <p>Welcome to Sharing Table, a cooking community for sharing recipes and meals together. </p><p>We hope you enjoy these recipes created by our community of members.</p><p>Like what you see? Then why not join us! Membership is free.</p> 
</div>  
  <div class="w3-row-padding" id="recipeContainer" >
    <input class="search w3-input w3-padding" placeholder="search" id="search"/>
    <button id="searchButton" class="emma-button">Search</button>
    <div class="w3-section w3-padding-16">
      <span class="w3-margin-right"><i class="fas fa-utensils w3-margin-right"></i> Filter:</span>
      <button class="w3-button w3-black" id="filter-none">ALL</button>
      <?php
      while ($group = $categories->fetch()) :
        $category = $group['category']?>
      
         <button class="w3-button w3-white filter" id="<?=$category?>">
         <?=$category?>
         <?php 
      endwhile;
      ?>
      </div>
      <ul class="list" id="output">
    <?php 
    foreach($recipes as $recipe) :
        ?> 
      <div class="w3-third w3-section w3-container" >
        <li>
          <div class="w3-card recipe-image">
            
            <a href="index.php?action=recipe&id=<?=$recipe->getId()?>">
              <img alt="food" class="w3-hover-opacity" 
        <?php if ($recipe->getImage() === NULL) :
          ?>
          src="uploads/recipes/generic.jpg" />
          <?php
        
        else :
          ?>
          src="<?=$recipe->getImage()?>" />
          <?php 
        endif;
        ?>
            </a>
        </div>
        <div class="w3-container recipe-info w3-card">
        <?php 
        $frontend = new \emmaliefmann\recipes\controller\Frontend();
        ?>
          <a class="w3-center" href="index.php?action=recipe&id=<?=$recipe->getId()?>"><h5 class="title"><?=$frontend->titleLimit($recipe->getTitle())?></h5></a>
          
          <p class="category invisible"><?=$recipe->getCategory()?></p>
          <button class="w3-button w3-round-xlarge w3-black w3-button w3-tiny authorButton pointer">SharingTable</button>
        </div>
        </li>
      </div>
      
    <?php
    endforeach;
    ?>
    
 </ul> 
<div class="w3-center w3-padding-32 w3-bar">
  <ul class="pagination"></ul>
  </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "All recipes" ?>
<?php $title = "Sharing Table - Recipe Library" ?>
<?php require('view/template.php') ?>
    