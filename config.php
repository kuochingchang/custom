<?php
// 根路径
define('CUSTOM_ROOT_PATH', __DIR__ . '/');

// 定义后台目录
define('ADMIN_DIR', 'admin');

// 调试模式
define('DEBUG', true);

// 数据库配置
define('DB_CONFIG', [
    // [必填]
    'type' => 'mysql',
    'host' => 'localhost',
    'database' => 'custom',
    'username' => 'root',
    'password' => 'root',

    // [可选]
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_general_ci',
    'port' => 3306,

    // [可选] 表前缀
    'prefix' => '',
]);


require CUSTOM_ROOT_PATH . 'includes/Common.php';

// 初始化
\Custom\Common::init();
\Custom\Widget\Init::alloc();
