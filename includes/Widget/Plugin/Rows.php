<?php

namespace Custom\Widget\Plugin;

use Custom\Helper\File;
use Custom\Widget;

/**
 * 插件列表组件
 */
class Rows extends Widget
{
    /**
     * 插件列表
     */
    public $plugins;

    public function execute()
    {
        $this->plugins = File::getInstance()->getPlugins();

        if ($this->request->status === 'activated') {
            $this->plugins = array_filter($this->plugins, function ($plugin) {
                return $plugin['is_activated'];
            });
        }
    }
}
