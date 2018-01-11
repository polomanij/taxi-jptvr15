<?php ob_start();?>
<div class="order-h3">
    <h3>Order Form</h3>
</div>

<form method="post" class="order">

    <div class="order-item">
        <label for="tel">Tel.</label>
        <input type="text" id="tel" name="tel">
    </div>
    
    <div class="order-item">
        <label for="adress">Adress</label>
        <input type="text" id="adress" name="adress">
    </div>

    <div class="order-item">
        <label for="message">Message</label>
        <input type="text" id="message" name="message">
    </div>

    <input type="submit" value="Send">
</form>

<?php
$content = ob_get_clean();
require_once 'view/templates/layout.php';