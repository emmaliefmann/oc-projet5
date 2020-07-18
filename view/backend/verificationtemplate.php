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
                <li><a href="index.php?action=member&page=newrecipe">Add Recipe</a></li>
                <li><a href="index.php?action=allrecipes">Recipe Library</a></li>
                <li><a href="index.php?action=signin">Sign In</a></li>
            </ul>  
		</nav>
    </header>
    <section class="title">
        <h1><?=$title?></h1>
        <div class="long-line"></div>
    </section>
    <main>
    <div>
        <form action="<?= $formAction . $id ?>" method="post">
            <p><?= $question ?></p><br/><br/>
            <input type="radio" name="delete" value="true" id="yes" />
            <label for="yes">Yes</label>
            <input type="radio" name="delete" value="false" id="no" checked="checked" />
            <label for="no">No</label><br/><br/>
            <input type="submit" value="Delete">
            <a href="index.php?action=member&page=dashboard" >Cancel</a>
        </form>
    </div> 
    </main>
    <footer>
        <p>footer</p>
    </footer>
    <script src="public/javascript/app.js"></script>
    </body>
</html>