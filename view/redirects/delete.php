<?php ob_start();
?>
<div class="lds-default"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
<?php
    $animation = ob_get_clean();
    $errorMessage = 'Successfully deleted';
    $redirection = "index.php?action=member&page=dashboard";


require('view/redirects/popuptemplate.php'); ?>