<?php ob_start() ?>

<div class="admin-h3">
    <h3>Services panel</h3>
</div>

<div class="featured clearfix">
    <table class="service-table clearfix">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Content</th>
            <th>Price</th>
            <th>Image</th>
        </tr>
        <?php foreach ($args1 as $service): ?>
        <tr>
            <td><?= $service->id ?></td>
            <td><?= $service->name ?></td>
            <td><?= $service->description ?></td>
            <td><?= $service->content ?></td>
            <td><?= $service->price ?></td>
            <td><?= $service->img ?></td>
            <td><a href="service-delete?id=<?= $service->id ?>">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <a class="create-btn clearfix" href="service-create">Create service</a>
</div>
<?php
$content = ob_get_clean();
require_once 'view/templates/layout.php';