<?php

namespace Custom\Widget;

use Custom\Common;
use Custom\Plugin;
use Custom\Router;
use Custom\Widget;

/**
 * 初始化组件
 */
class Init extends Widget
{
    public function execute()
    {
        // 非调试模式开启友好异常提示
        if (defined(DEBUG) || !DEBUG) {
            // 初始化异常处理
            set_exception_handler(function ($exception) {
                ob_end_clean();
                ob_start(function ($content) {
                    return $content;
                });

                Common::error($exception);
                exit;
            });
        }

        // 获取选项对象
        $option = Option::alloc();

        // 初始化路由器
        Router::setRoutes($option->routingTable);

        // 初始化插件
        Plugin::init($option->plugins);
    }
}
