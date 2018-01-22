<?php ob_start() ?>

<div id="featured">
    <h3>Admin panel</h3>
    <p>Welcome to admin panel.</p>
</div>
<?php
$content = ob_get_clean();
require_once 'view/templates/layout.php';