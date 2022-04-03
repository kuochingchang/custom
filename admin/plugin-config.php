<?php
require __DIR__ . '/common.php';
require __DIR__ . '/header.php';
?>
<div class="container">
    <h2 class="custom-title">插件配置</h2>
    <?php Custom\Widget\Plugin\Config::alloc(); ?>
</div>
<?php require __DIR__ . '/footer.php'; ?>
