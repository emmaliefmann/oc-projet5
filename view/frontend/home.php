<?php ob_start(); ?>
<div class="w3-display-container w3-content w3-wide">
    <img src="public/images/sharing.jpg" alt="" class="w3-image w3-opacity emma-background-img">
    <div class="w3-display-middle w3-padding-large">
        <h2 class="w3-xxlarge w3-text-white">Welcome to sharing table</h2>
        
    </div>
</div>
<div>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos id consequatur, voluptates amet nostrum error obcaecati exercitationem atque distinctio quasi sint tempora? Non, voluptatum. Aspernatur, tenetur mollitia? Commodi, ullam? Inventore odio incidunt distinctio earum magnam laudantium perspiciatis facilis. Voluptates ducimus veritatis deleniti consectetur itaque nihil eius commodi sapiente nemo cupiditate?
</p>
<p>Lorem ipsum perspiciatis facilis. Voluptates ducimus veritatis deleniti consectetur itaque nihil eius commodi sapiente nemo cupiditate?
</p>
</div>
<div class="w3-container w3-row emma-container">
    <div class="w3-container w3-third emma-col">
        <div class="w3-card home-card display">
            <h5 class="w3-center">About us</h5>
            <i class="fas fa-question fa-3x"></i>
            <button class="w3-button w3-center w3-round-xlarge w3-black w3-button w3-tiny authorButton"><a href="index.php?action=aboutus">About</a></button>
        </div>
        <div class="w3-card home-card display">
            <h5 class="w3-center">Library</h5>
            <i class="fas fa-book-open fa-3x"></i>
            <button class="w3-button w3-center w3-round-xlarge w3-black w3-button w3-tiny authorButton"><a href="index.php?action=allrecipes">Library</a></button>
        </div>
    </div>
    <div class="w3-container w3-third emma-col">
        <div>
        <img src="public/images/long-table.jpg" class="w3-round" alt="long-table">
        </div>
    </div>
    <div class="w3-container w3-third emma-col">
    <div class="w3-card home-card display">
            <h5 class="w3-center">Join us</h5>
            <i class="fas fa-users fa-3x"></i>
            <button class="w3-button w3-center w3-round-xlarge w3-black w3-button w3-tiny authorButton"><a href="index.php?action=register">Sign up</a></button>
        </div>
        <div class="w3-card home-card display">
            <h5 class="w3-center">Global recipe database</h5>
            <i class="far fa-bookmark fa-3x"></i>
            <button class="w3-button w3-center w3-round-xlarge w3-black w3-button w3-tiny authorButton"><a href="index.php?action=allrecipes">Spoonacular</a></button>
        </div>
    </div>
</div>
<div class="w3-row">
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos id consequatur, voluptates amet nostrum error obcaecati exercitationem atque distinctio quasi sint tempora? Non, voluptatum. Aspernatur, tenetur mollitia? Commodi, ullam? Inventore odio incidunt distinctio earum magnam laudantium perspiciatis facilis. Voluptates ducimus veritatis deleniti consectetur itaque nihil eius commodi sapiente nemo cupiditate?
    </p>
    <h4>Meet the team</h4>
    <div class="w3-quarter w3-opacity-min">
        <img src="public/images/portrait1.jpg" class="portrait w3-grayscale w3-padding w3-hover-opacity"  alt="headshot">
    </div>
    <div class="w3-quarter w3-opacity-min">
        <img src="public/images/portrait2.jpg" class="portrait w3-grayscale w3-padding w3-hover-opacity" alt="headshot">
    </div>
    <div class="w3-quarter w3-opacity-min">
        <img src="public/images/portrait3.jpg" class="portrait w3-grayscale w3-padding w3-hover-opacity" alt="headshot">
    </div>
    <div class="w3-quarter w3-opacity-min">
        <img src="public/images/portrait4.jpg" class="portrait w3-grayscale w3-padding w3-hover-opacityf" alt="headshot">
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "homepage" ?>
<?php $title = "Sharing Table" ?>
<?php require('view/template.php') ?>
    