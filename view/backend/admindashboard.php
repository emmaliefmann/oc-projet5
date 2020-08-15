<?php ob_start(); ?>

<h2>Admin</h2>
<h3>Members</h3>
    <ul>
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
            <a href="index.php?action=member&page=admin&req=allowaccess&id=<?=$user->getId()?>"><i class="far fa-thumbs-up"></i></a>
        </span>
        </li>
        <?php 
        }?>
    </ul>
    <h3>Moderate comments</h3>
    <ul>
        <?php 
        foreach ($comments as $comment) {
            ?>
            <li>
                <?=$comment->getComment()?> by <?=$comment->getAuthor()?> on <?=$comment->getCreationDate()?>
                <a href="index.php?action=member&page=admin&req=deletethiscom&id=<?=$comment->getId()?>"><i class="far fa-trash-alt"></i></a>
            <?php
        }
        ?>
    </ul>
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