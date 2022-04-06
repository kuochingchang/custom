<?php

namespace Custom\Widget\Theme;

use Custom\Helper\SystemFile;
use Custom\Widget;

/**
 * 主题列表组件
 */
class Rows extends Widget
{
    /**
     * 主题列表
     */
    public $themes;

    public function execute()
    {
        $this->themes = SystemFile::getInstance()->getThemes();
    }
}
