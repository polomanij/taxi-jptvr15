<?php ob_start() ?>

<div id="featured">
    <h3>Taxi services</h3>
    <p>Our website can help you to order the taxi service in any time! Just live your order in services page.</p>
</div>
<?php
$content = ob_get_clean();
require_once 'view/templates/layout.php';