<?php ob_start();
?>
<div class="lds-default"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
<?php
    $animation = ob_get_clean();
    $errorMessage = 'The log in details are incorrect';
    $redirection = "index.php?action=signin";


require('view/redirects/popuptemplate.php'); ?>