<?php

namespace Custom\Widget\Plugin;

use Custom\Helper\Renderer;
use Custom\Plugin;
use Custom\Widget\Base\Option;
use Exception;

/**
 * 插件配置组件
 */
class Config extends Option
{
    public function execute()
    {
        // 插件名称
        $pluginName = $this->request->config;
        // 已启用插件
        $activatedPlugins = Plugin::export();

        if (!isset($activatedPlugins[$pluginName])) {
            throw new Exception('插件未启用', 500);
        }

        $className = $activatedPlugins[$pluginName]['class_name'];
        $pluginConfig = $activatedPlugins[$pluginName]['config'];

        $renderer = new Renderer();
        call_user_func([$className, 'config'], $renderer);

        $renderer->render($pluginConfig);
    }
}
