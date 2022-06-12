<?php

namespace Custom\Widget;

use Custom\Common;
use Custom\Widget\Base\Base;

/**
 * 系统选项
 */
class Option extends Base
{
    // public $routingTable = [
    //     [
    //         'regx' => '/^[\/]?$/',
    //         'widget' => '\Custom\Widget\Index',
    //         'action' => 'render',
    //     ],
    //     [
    //         'regx' => '/^\/action\/([_0-9a-zA-Z-]+)[\/]?$/',
    //         'widget' => '\Custom\Widget\Action',
    //         'params' => ['action'],
    //     ],
    // ];

    public function execute()
    {
        // 压入配置
        $options = $this->db->select('options', '*');
        foreach ($options as $option) {
            $this->{$option['name']} = $option['value'];
        }

        // 路由表反序列化
        $this->routingTable = unserialize($this->routingTable);
        // 激活插件反序列化
        $this->plugins = isset($this->plugins) && !empty($this->plugins) ? unserialize($this->plugins) : [];
    }

    /**
     * 获取插件选项
     */
    public function plugin($pluginName)
    {
        return $this->plugins[$pluginName]['config'];
    }

    /**
     * 获取主题文件夹
     */
    public function themeDir()
    {
        return CUSTOM_ROOT_PATH . 'content/themes/' . $this->theme . '/';
    }

    /**
     * 获取站点地址
     *
     * @param $uri URI 字符串
     */
    public function siteUrl($uri = '')
    {
        return $this->request->getUrlPrefix() . rtrim('/' . trim($uri, '/'), '/');
    }

    /**
     * 获取后台站点地址
     *
     * @param $uri URI 字符串
     */
    public function adminSiteUrl($uri = '')
    {
        return $this->request->getUrlPrefix() . '/' . ADMIN_DIR . rtrim('/' . trim($uri, '/'), '/');
    }
}
