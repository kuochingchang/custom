<?php defined('CUSTOM_ROOT_PATH') || exit; ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台管理</title>
    <link rel="stylesheet" href="<?= $option->adminSiteUrl('css/index.min.css'); ?>">
</head>

<body>
    <div class="custom-admin-header-wrap">
        <h1 class="header-item-logo"><a href="<?= $option->adminSiteUrl('index.php'); ?>">Custom</a></h1>
        <ul class="header-item-menu">
            <li class="item" data-action="console">
                <a class="item-link" href="<?= $option->adminSiteUrl('index.php'); ?>">控制台</a>
                <ul class="item-submenu">
                    <li class="subitem"><a class="subitem-link" href="<?= $option->adminSiteUrl('index.php'); ?>">网站概要</a></li>
                    <li class="subitem"><a class="subitem-link" href="<?= $option->adminSiteUrl('plugin.php'); ?>">插件</a></li>
                    <li class="subitem"><a class="subitem-link" href="<?= $option->adminSiteUrl('theme.php'); ?>">主题</a></li>
                </ul>
            </li>
            <li class="item" data-action="setting">
                <a class="item-link" href="<?= $option->adminSiteUrl('profile.php'); ?>">设置</a>
                <ul class="item-submenu">
                    <li class="subitem"><a class="subitem-link" href="<?= $option->adminSiteUrl('profile.php'); ?>">个人资料</a></li>
                    <li class="subitem"><a class="subitem-link" href="<?= $option->adminSiteUrl('general.php'); ?>">基本设置</a></li>
                </ul>
            </li>
        </ul>
        <div class="header-item-user">
            <span class="username">Noah
                <?php \Custom\Plugin::factory('admin/header.php')->brief() ?>
            </span>
            <a href="<?= $option->siteUrl() ?>">返回首页</a>
        </div>
    </div>
