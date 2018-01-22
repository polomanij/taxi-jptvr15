<?php ob_start();?>
<div class="order-h3">
    <h3>Order Form</h3>
</div>

<div class="featured">
    <p>User was registered succesfully!</p>
</div>

<?php
$content = ob_get_clean();
require_once 'view/templates/layout.php';