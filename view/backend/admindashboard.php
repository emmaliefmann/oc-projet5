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
        <span class="w3-bar-item w3-large w3-right">
            <a href="index.php?action=member&page=admin&req=suspendthisaccess&id=<?=$user->getId()?>"><i class="far fa-thumbs-down"></i></a>
            <a href="index.php?action=member&page=admin&req=allowaccess&id=<?=$user->getId()?>"><i class="far fa-thumbs-up"></i></a>
        </span>
        </li>
        <?php 
        }?>
    </ul>
    <h3>Moderate Comments and recipes</h3>
    <?php 
    for ($i = 0; $i < count($groupComments); $i++) {
        $group = $groupComments[$i];
        //title
        if (array_key_exists(0, $group)) {
            ?>
            <ul class="w3-ul w3-border">
            <li class="w3-bar">
                <div class="w3-bar-item">
                    <h4><?=$groupComments[$i][0]->getRecipeTitle()?></h4> 
                </div>
                <span class="w3-bar-item w3-right">
                    <a href="index.php?action=member&page=admin&req=deletethisrec&id=<?=$recipe->getId()?>"><i class="far fa-trash-alt"></i></a>
                    <a href="index.php?action=recipe&id=<?=$recipe->getId()?>"><i class="fas fa-eye"></i></a>
                </span>
            </li>
            
            <?php
            foreach($group as $comment) {
            ?>
            <li><?=$comment->getComment()?>
                <span>
                    <a href="index.php?action=member&page=admin&req=deletethiscom&id=<?=$comment->getId()?>"><i class="far fa-trash-alt"></i></a>
                </span>
            </li>
            <?php
            }
            ?>
            </ul><br><br>
            <?php
        } else {
            echo false;
        }
    }
    ?>

<?php $content = ob_get_clean(); ?>
<?php $pageTitle = "Admin page" ?>
<?php $title = "Sharing Table - Administration" ?>
<?php require('view/template.php') ?>