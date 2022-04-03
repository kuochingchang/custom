<?php

namespace Custom\Widget\Theme;

use Custom\Widget\ActionInterface;
use Custom\Widget\Base\Option;
use Custom\Widget\Option as WidgetOption;
use Exception;

/**
 * 主题处理组件
 */
class Handler extends Option implements ActionInterface
{
    /**
     * 启用插件
     */
    public function activate($themeName)
    {
        // 已启用主题
        $theme = WidgetOption::alloc()->theme;
        if ($themeName === $theme) {
            throw new Exception('不能重复启用主题', 500);
        }

        $this->updateTheme($themeName);
        // 重定向
        $this->response->back();
    }

    public function action()
    {
        // 启用主题
        $this->on($this->request->is('activate'))->activate($this->request->activate);

        // 停用主题
        // $this->on($this->request->is('deactivate'))->deactivate($this->request->deactivate);

        // 修改主题
        // $this->on($this->request->is('config'))->config($this->request->config);
    }
}
