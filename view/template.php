<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Emma Liefmann" >

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" >
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">  
    <link href="public/css/style.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
    <title><?=$title?></title>
</head>
<body>
    <header>     
    <nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left emma-menu" id="mySidebar">
        <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button">Close Menu</a>
        <a href="index.php" class="logo w3-bar-item w3-button"><i class="fas fa-home"></i></a> 
            <?php if(isset($_SESSION['active']) && $_SESSION['active']=== true) {
        ?>
            <a href="index.php?action=member&page=newrecipe" class="w3-bar-item w3-button" onclick="w3_close()">Add Recipe</a>
            <a href="index.php?action=allrecipes" class="w3-bar-item w3-button" onclick="w3_close()">Recipe Library</a>
            <a href="index.php?action=?action=member&page=dashboard" class="w3-bar-item w3-button" onclick="w3_close()">Your profile</a>
            <a href="index.php?action=member&page=logout" class="w3-bar-item w3-button" onclick="w3_close()">Sign out</a>
        <?php
        }
        else {?>
                <a href="index.php?action=register" class="w3-bar-item w3-button" onclick="w3_close()">Create an account</a>
                <a href="index.php?action=allrecipes" class="w3-bar-item w3-button" onclick="w3_close()">Recipe Library</a>
                <a href="index.php?action=allrecipes" class="w3-bar-item w3-button" onclick="w3_close()">About us</a>
                <a href="index.php?action=signin" class="w3-bar-item w3-button" onclick="w3_close()">Sign In</a>
        <?php    
        }?>  
		</nav>
        <!-- filtering menu -->
        <div class="w3-bar w3-card">
            <div class="w3-white w3-xlarge emma-header" >
                <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
                <div class="w3-center w3-padding-16"><h1>Food Friends</h1></div>
            </div>
        </div>
    </header>
    <!-- !PAGE CONTENT! -->
    <main class="w3-main w3-content w3-padding" >
        <?= $content ?>
    </main>
    <footer class="w3-container w3-grey w3-center w3-margin-top">
        <p>Footer</p>
        <i class="fab fa-facebook-square fa-2x w3-hover-opacity emma-icon"></i>
        <i class="fab fa-instagram-square  fa-2x w3-hover-opacity emma-icon"></i>
        <i class="fab fa-pinterest-square fa-2x w3-hover-opacity emma-icon"></i>
        <i class="fab fa-twitter-square fa-2x w3-hover-opacity emma-icon"></i>
        <i class="fab fa-linkedin fa-2x w3-hover-opacity emma-icon"></i>
        <p>Created by <a href="https://www.emmaliefmann.com/" target="_blank">Emma Liefmann</a></p>
</footer>
    <script src="public/javascript/app.js"></script>
    
    <script>
    // Script to open and close sidebar
    function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    }
    
    function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    }

    

    </script>
    </body>
</html>