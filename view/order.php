<?php ob_start();?>
<div class="order-h3">
    <h3>Order Form</h3>
</div>

<form method="post" class="order clearfix">
    <div class="order-item clearfix">
        <label for="name">Name</label>
        <input type="text" id="name" name="name">
    </div>

    <div class="order-item clearfix">
        <label for="tel">Tel.</label>
        <input type="text" id="tel" name="tel">
    </div>
    
    <div class="order-item clearfix">
        <label for="adress">Adress</label>
        <input type="text" id="adress" name="adress">
    </div>
    
    <div class="order-item clearfix">
        <label for="services">services:</label>
        <select id="services" name="services">
            <?php foreach ($args1 as $service): ?>
                <option><?= $service->name ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="order-item clearfix">
        <label for="message">Message:</label>
        <textarea id="message" name="message"></textarea>
    </div>
    
    <input type="submit" value="Send" name="submit">
</form>

<?php
$content = ob_get_clean();
require_once 'view/templates/layout.php';