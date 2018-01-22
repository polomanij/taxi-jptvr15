<?php ob_start();?>
<div class="order-h3">
    <h3>Order Form</h3>
</div>

<div class="featured">
    <p>Order was created succesfully! We will call you soon.</p>
</div>

<?php
$content = ob_get_clean();
require_once 'view/templates/layout.php';