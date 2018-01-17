<?php ob_start() ?>

<div id="featured" class="clearfix">
    <h3><?= $args1['name'] ?></h3>
    <div class="service-img-block clearfix">
        <img src="public/images/<?= $args1['img']; ?>" class="service-img">
    </div>

    <p><?= $args1['description']; ?></p>
    <p><?= $args1['content']; ?></p>
    <p><?= $args1['price'] . ' EUR'; ?></p>
    <a href="order">Make order</a>
</div>
<?php
$content = ob_get_clean();
require_once 'view/templates/layout.php';