<?php ob_start(); ?>
<div class="w3-display-container w3-content w3-wide">
    <img src="public/images/sharing.jpg" alt="" class="w3-image w3-opacity emma-background-img">
    <div class="w3-display-middle w3-padding-large">
        <h2 class="w3-xxlarge w3-text-white">About us</h2>
    </div>
</div>
<div class="w3-content">
    <div class="w3-row w3-padding-64">
        <div class="w3-col m6 w3-padding-large w3-hide-small">
            <img src="public/images/cooking.jpg" alt="" class="w3-image w3-opacity-min">
        </div>
        <div class="w3-col m6 w3-padding-large">
            <h3 class="w3-center w3-xxLarge side-image">About Sharing Table</h3>
            <h5>Associationg for cooks and food-lovers in Nantes</h5>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos cum fuga ab alias nesciunt repudiandae magni voluptatibus fugit eveniet ullam?</p>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Error ducimus omnis, eos quam, qui ipsam et ut sint explicabo quidem, debitis impedit quos veniam officia ea dignissimos dolores odit. Fugiat quisquam, minus harum accusamus accusantium vel quas veniam. Corrupti, sint.</p>
            <div class="w3-row w3-padding-48">
                <div class="w3-container w3-padding-16 w3-half">
                    <div class="recipe-info w3-card w3-container">
                        <h5 class="w3-center">Become a member today</h5>
                        <button class="w3-button w3-center w3-round-xlarge w3-black w3-button w3-tiny authorButton">Sign up</button>
                    </div> 
                </div>
                <div class="w3-container w3-padding-16 w3-half">
                    <div class="recipe-info w3-card w3-container">
                        <h5 class="w3-center">View the recipe library</h5>
                        <button class="w3-button w3-center w3-round-xlarge w3-black w3-button w3-tiny authorButton"><a href="index.php?action=allrecipes">Library</a></button>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    
</div>
<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "About Us" ?>
<?php $title = "Sharing Table - About" ?>
<?php require('view/template.php') ?>