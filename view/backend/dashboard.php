<?php ob_start(); ?>

<h2>dashboard</h2>
<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis laborum a similique dolores, nobis natus tenetur officia distinctio expedita necessitatibus autem doloremque fugiat eveniet. Quos minima veritatis ipsum sed tempore repudiandae illo expedita at molestias eaque quia nobis aut quas nemo temporibus explicabo non repellendus deserunt, itaque quasi soluta? At voluptatem officia consequuntur nostrum corporis ad iure debitis illum, dolorem dolores, reiciendis assumenda neque, adipisci eos! Rerum accusamus dignissimos dolorum quasi, illo explicabo aliquam natus, expedita aut ad magnam magni mollitia? Rerum magni dolorem mollitia, tenetur deleniti minima ex placeat aliquam fugit sint doloribus dolores voluptatibus in facilis tempore molestiae!</p>
<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "Members page" ?>
<?php $title = "RecipeApp - Your account" ?>
<?php require('view/template.php') ?>
    