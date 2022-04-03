<?php require __DIR__ . '/common.php';
require __DIR__ . '/header.php'; ?>
<div class="container">
    <h2 class="custom-title">主题管理</h2>
    <div class="theme">
        <div class="custom-tabs">
            <a class="tab" href="<?= $option->adminSiteUrl('theme.php') ?>">全部主题</a>
        </div>
        <div class="custom-table">
            <table>
                <colgroup>
                    <col width="30%">
                    <col width="70%">
                </colgroup>
                <thead>
                    <tr>
                        <th>截图</th>
                        <th>详情</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $themes = \Custom\Widget\Theme\Rows::alloc()->themes; ?>
                    <?php foreach ($themes as $theme) : ?>
                        <tr class="<?= $theme['is_activated'] ? 'active' : '' ?>">
                            <td>
                                <img class="preview" src="" alt="">
                            </td>
                            <td>
                                <?php if ($theme['is_complete']) : ?>
                                    <h3 class="theme-name"><?= $theme['name'] ?></h3>
                                    <div class="theme-info">
                                        <div>
                                            <span>作者：</span>
                                            <a href="<?= $theme['author_url'] ?>"><?= $theme['author'] ?></a>
                                        </div>
                                        <div>版本：<?= $theme['version'] ?></div>
                                    </div>
                                    <p class="theme-description"><?= $theme['description'] ?></p>
                                    <div class="action">
                                        <?php if (!$theme['is_activated']) : ?>
                                            <a href="<?= $option->siteUrl('action/theme-handler?activate=' . $theme['dir']) ?>">启用</a>
                                            <a href="<?= $option->adminSiteUrl('theme-config.php?config=' . $theme['dir']) ?>">编辑</a>
                                        <?php endif; ?>
                                    </div>
                                <?php else : ?>
                                    已损坏
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
