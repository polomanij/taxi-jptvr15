<?php ob_start();?>

<ul>
    <?php foreach ($args1 as $service): ?>
        <li>
                <div class="featured">
                        <img class="service-img" src="public/images/<?= $service->img; ?>" alt=""/>
                </div>
                <div>
                        <h3><?= $service->name; ?></h3>
                        <?= "<p>{$service->description}</p>"; ?>
                        <a href="services?id=<?= $service->id ?>" class="more-btn">More</a>
                </div>
        </li>
    <?php endforeach; ?>
</ul>

<?php
$content = ob_get_clean();
require_once 'view/templates/layout.php';