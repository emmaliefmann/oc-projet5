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
                <li><a href="index.php?action=register">Create an account</a></li>
                <li><a href="index.php?action=addrecipe">Add Recipe</a></li>
                <li><a href="index.php?action=signin">Sign In</a></li>
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
        <p>Mentions Legales</p>
    </footer>
    </body>
</html>