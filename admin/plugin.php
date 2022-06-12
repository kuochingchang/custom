<?php
require __DIR__ . '/common.php';
require __DIR__ . '/header.php';
?>
<div class="container">
    <h2 class="custom-title">插件管理</h2>
    <div class="plugin">
        <div class="custom-tabs">
            <a class="tab" href="<?= $option->adminSiteUrl('plugin.php') ?>">全部插件</a>
            <a class="tab" href="<?= $option->adminSiteUrl('plugin.php?status=activated') ?>">已启用</a>
        </div>
        <div class="custom-table">
            <table>
                <colgroup>
                    <col width="25%">
                    <col width="30%">
                    <col width="15%">
                    <col width="15%">
                    <col width="15%">
                </colgroup>
                <thead>
                    <tr>
                        <th>名称</th>
                        <th>描述</th>
                        <th>版本</th>
                        <th>作者</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $plugins = \Custom\Widget\Plugin\Rows::alloc()->plugins; ?>
                    <?php foreach ($plugins as $plugin) : ?>
                        <tr>
                            <td><?= $plugin['name'] ?></td>
                            <td><?= $plugin['description'] ?></td>
                            <td><?= $plugin['version'] ?></td>
                            <td><?= $plugin['author'] ?></td>
                            <td class="action">
                                <?php if ($plugin['is_complete'] && $plugin['is_activated']) : ?>
                                    <a href="<?= $option->adminSiteUrl('plugin-config.php?config=' . $plugin['dir']) ?>">设置</a>
                                    <a href="<?= $option->siteUrl('index.php/action/plugin-handler?deactivate=' . $plugin['dir']) ?>">禁用</a>
                                <?php elseif ($plugin['is_complete']) : ?>
                                    <a href="<?= $option->siteUrl('index.php/action/plugin-handler?activate=' . $plugin['dir']) ?>">启用</a>
                                <?php else : ?>
                                    <span>损坏</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require __DIR__ . '/footer.php'; ?>
