<?php ob_start();
?>
<div class="lds-default"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
<?php
    $animation = ob_get_clean();
$errorMessage = 'Your account is not yet active. Please contact the administrator for more information.';
    $redirection = "http://localhost/projet5/index.php?action=member&page=dashboard";
    require('view/redirects/popuptemplate.php'); ?>