<?php ob_start(); ?>

<h2>Admin</h2>
<h3>Members</h3>
    <ul class="w3-ul w3-card-4">
    <?php foreach($users as $user) {?>
        <li class="w3-bar">
        <span class="w3-bar-item w3-circle">
        <?php 
        if ($user->getActive() === "active") {
            ?>
            <i class="far fa-check-circle fa-2x w3-text-green"></i>
            <?php
        } elseif ($user->getActive() === "suspended") {
            ?>
            <i class="far fa-times-circle fa-2x w3-text-red"></i>
            <?php } else {
                ?> 
                <i class="far fa-question-circle fa-2x w3-text-orange"></i>
            <?php }
            ?>
            </span> 
            <div class="w3-bar-item">
                <span class="w3-large">
                    <?=$user->getUserName()?>
                </span><br>
                <span><?=$user->getCreationDate()?></span>

            </div>
        <span class="w3-bar-item w3-button w3-xlarge w3-right button-container">
            <a href="index.php?action=member&page=admin&req=suspendthisaccess&id=<?=$user->getId()?>"><i class="far fa-thumbs-down"></i></a>
            <a href="index.php?action=member&page=admin&req=allowaccess&id=<?=$user->getId()?>"><i class="far fa-thumbs-up"></i></a>
        </span>
        </li>
        <?php 
        }?>
    </ul>
    <h3>Moderate comments</h3>
    <?php 
    for ($i = 0; $i < count($groupComments); $i++) {
        $group = $groupComments[$i];
        //title
        if (array_key_exists(0, $group)) {
            ?>
            <h5><?=$groupComments[$i][0]->getRecipeTitle()?></h5>
            <ul>
            <?php
            foreach($group as $comment) {
            ?>
            <li><?=$comment->getComment()?>
                <span>
                    <a href="index.php?action=member&action=admin&req=deletethiscom&id=<?=$comment->getId()?>"><i class="far fa-trash-alt"></i></a>
                </span>
            </li>
            <?php
            }
            ?>
            </ul>
            <?php
        } else {
            echo false;
        }
    }
    ?>
    <h3>Delete recipes</h3>
    <ul>
        <?php 

        foreach ($recipes as $recipe) {
            ?>
            <li>
                <?=$recipe->getTitle()?> by <?=$recipe->getUserId()?>
                <a href="index.php?action=member&page=admin&req=deletethisrec&id=<?=$recipe->getId()?>"><i class="far fa-trash-alt"></i></a>
            <?php
        }
        ?>
    </ul>
<p>update about page text</p>
<p>Update categories</p>

<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "Members page" ?>
<?php $title = "RecipeApp - Administration" ?>
<?php require('view/template.php') ?>