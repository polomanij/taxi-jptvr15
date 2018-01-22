<?php ob_start() ?>

<div class="admin-h3">
    <h3>Service creating panel</h3>
</div>

<div class="featured clearfix">
    <form method="post" enctype="multipart/form-data">
        <table class="clearfix">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Content</th>
                <th>Price</th>
                <th>Image</th>
            </tr>
            <tr>
                <td><input type="text" name="name"></td>
                <td><input type="text" name="desc"></td>
                <td><input type="text" name="content"></td>
                <td><input type="text" name="price"></td>
                <td><input type="file" name="image"></td>
            </tr>
        </table>
        <input class="create-input" type="submit" value="Create" name="submit">
    </form>
</div>
<?php
$content = ob_get_clean();
require_once 'view/templates/layout.php';