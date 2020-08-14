<?php ob_start(); ?>

<h2>Admin</h2>
<h3>Members<h3>
    <ul>
        <li>Function to get all members and whether active, suspended or pending</li>
        <li>Member name, three button options</li>
        <?php foreach($users as $user) {?>
            <li> 
            <?php 
            if ($user->getActive() === "active") {
                ?>
                <i class="far fa-check-circle"></i>
                <?php
            } elseif ($user->getActive() === "suspended") {
                ?>
                <i class="far fa-times-circle"></i>
                <?php } else {
                    ?> 
                    <i class="far fa-question-circle"></i>
                <?php }?> <?=$user->getUserName()?>
            <span>
                <a href="index.php?action=member&page=admin&req=suspendthisaccess&id=<?=$user->getId()?>"><i class="far fa-thumbs-down"></i></a>
                <a href="index.php?action=member&page=admin&req=allowthisaccess&id=<?=$user->getId()?>"><i class="far fa-thumbs-up"></i></a>
            </span>
            </li>
            <?php 
        }?>
    </ul>
    <li>Delete comments</li>
    <li>Delete recipes</li>


<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "Members page" ?>
<?php $title = "RecipeApp - Administration" ?>
<?php require('view/template.php') ?>