<?php ob_start();
?>
<div class="lds-default"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
<?php
    $animation = ob_get_clean();
    $errorMessage = 'You need to sign in to perform this action';
    $redirection = "index.php?action=signin";


require('view/redirects/popuptemplate.php'); ?>