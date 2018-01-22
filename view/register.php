<?php ob_start();?>
<div class="order-h3">
    <h3>Register Form</h3>
</div>

<form method="post" class="order clearfix">
    <div class="errors">
        <?php
            if (isset($args1)) {
                foreach ($args1 as $error) {
                    echo "<p>$error</p>";
                }
            }
        ?>
    </div>
    <div class="order-item clearfix">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
    </div>

    <div class="order-item clearfix">
        <label for="pass">Password</label>
        <input type="password" id="pass" name="pass" required>
    </div>
    
    <div class="order-item clearfix">
        <label for="pass-2"> Reset password</label>
        <input type="password" id="pass-2" name="pass-2" required>
    </div>
    
    <div class="order-item clearfix">
        <label for="name">Name</label>
        <input type="text" id="pass" name="name" required>
    </div>
    
    <input type="submit" value="Send" name="submit">
</form>

<?php
$content = ob_get_clean();
require_once 'view/templates/layout.php';