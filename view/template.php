<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Emma Liefmann" >

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" >
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link href="public/css/style.css" rel="stylesheet"> 
    <title><?=$title?></title>
</head>
<body>
    <header>     
        <nav>
            <div class="hamburger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <a href="index.php" class="logo"><i class="fas fa-home"></i></a> 
            <ul class="nav-links">
            <?php if(isset($_SESSION['active']) && $_SESSION['active']=== true) {
        ?>
            <li><a href="index.php?action=member&page=newrecipe">Add Recipe</a></li>
            <li><a href="index.php?action=allrecipes">Recipe Library</a></li>
            <li><a href="index.php?action=allrecipes">Your profile</a></li>
            <li><a href="index.php?action=member&page=logout">Sign out</a></li>
        <?php
        }
        else {?>
                <li><a href="index.php?action=register">Create an account</a></li>
                <li><a href="index.php?action=allrecipes">Recipe Library</a></li>
                <li><a href="index.php?action=allrecipes">About us</a></li>
                <li><a href="index.php?action=signin">Sign In</a></li>
        <?php    
        }?>
                
            </ul>  
		</nav>
    </header>
    <section class="title">
        <h1><?=$pageTitle?></h1>
        <div class="long-line"></div>
    </section>
    <main>
    
        <?= $content ?>
    </main>
    <footer>
        <p>footer</p>
    </footer>
    <script src="public/javascript/app.js"></script>
    </body>
</html>