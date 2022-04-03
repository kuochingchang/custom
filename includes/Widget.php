<?php

namespace Custom;

use Custom\Helper\EmptyClass;

abstract class Widget
{
    /**
     * widget 对象池
     */
    private static $widgetPool = [];

    /**
     * 参数
     */
    protected $params;

    /**
     * 构造函数
     *
     * @param object $request Request 对象
     * @param object $response Response 对象
     * @param object $params 参数
     */
    public function __construct($request, $response, $params)
    {
        $this->request = $request;
        $this->response = $response;
        $this->params = $params;

        $this->init();
    }

    protected function init()
    {
    }

    public function execute()
    {
    }

    /**
     * 获取组件实例
     *
     * @param array $params 参数列表
     */
    public static function alloc($params = [])
    {
        return self::factory(static::class, $params);
    }

    /**
     * 获取别名组件实例
     */
    public static function allocWithAlias($alias, $params = [])
    {
        return self::factory(static::class . '@' . $alias, $params);
    }

    /**
     * 工厂方法
     *
     * @param mixed $className 组件类名
     * @param mixed $params 参数列表
     */
    public static function factory($alias, $params = null)
    {
        [$className] = explode('@', $alias);

        // 判断组件池是否存在
        if (!isset(self::$widgetPool[$alias])) {
            // 初始化 request
            $request = Request::getInstance();
            // 初始化 response
            $response = Response::getInstance();

            try {
                $widget = new $className($request, $response, $params);
                // 执行
                $widget->execute();
            } catch (\Throwable $th) {
                throw $th;
                $widget = $widget ?? null;
            }

            self::$widgetPool[$alias] = $widget;
        }

        return self::$widgetPool[$alias];
    }

    /**
     * 类赋值
     *
     * @param mixed $variable 变量
     * @param string $key 键值
     */
    public function to(&$variable)
    {
        return $variable = $this;
    }

    /**
     * 行动绑定
     */
    public function on($condition)
    {
        if ($condition) {
            return $this;
        } else {
            return EmptyClass::getInstance();
        }
    }
}
