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
    
    <title>Redirection</title>
</head>
<body>
<header>
    <div class="w3-bar w3-card">
        <div class="w3-white w3-xlarge emma-header" >
            <div class="w3-center w3-padding-16"><a href="index.php?action=allrecipes"><h1>Food Friends</h1></a></div>
        </div>
    </div>
</header>
    <main>
        <div class="error-box">
            <h1><?=$errorMessage?></h1>
            <div class="lds-default"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
            <h3>You will be redirected</h3>
            <img src="public/images/noentry.jpg" alt="No entry sign" class="redirect-img">
            <span class="invisible" id="redirectAddress"><?=$redirection?></span>
        </div>
    </main>
    
    <script src="public/javascript/app.js"></script>
    <script src="public/javascript/popup.js"></script>
</body>
</html>