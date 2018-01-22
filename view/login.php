<?php ob_start();?>
<div class="order-h3">
    <h3>Login</h3>
</div>

<form method="post" class="order clearfix">
    <div class="order-item clearfix">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
    </div>

    <div class="order-item clearfix">
        <label for="pass">Password</label>
        <input type="password" id="pass" name="pass" required>
    </div>
    
    <input type="submit" value="Send" name="submit">
</form>

<?php
$content = ob_get_clean();
require_once 'view/templates/layout.php';