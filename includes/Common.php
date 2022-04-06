<?php

namespace {
    // 定义类片段别名
    define('CLASS_FRAGMENT_ALIASES', [
        'Custom' => 'includes',
        'Content' => 'content',
        'Themes' => 'themes',
        'Plugins' => 'plugins',
    ]);

    // 自动加载
    spl_autoload_register(function ($className) {
        $classFragments = explode('\\', $className);

        array_walk($classFragments, function (&$fragment) {
            if (isset(CLASS_FRAGMENT_ALIASES[$fragment])) {
                $fragment = CLASS_FRAGMENT_ALIASES[$fragment];
            }
        });

        $filename = CUSTOM_ROOT_PATH . implode('/', $classFragments) . '.php';

        if (file_exists($filename)) {
            include $filename;
        }
    });
}

namespace Custom {
    /**
     * 公共用组件
     */
    class Common
    {
        /**
         * 程序初始化
         */
        public static function init()
        {
            // 开启缓存区
            ob_start(function ($buffer) {
                return $buffer;
            });
        }

        /**
         * 错误输出
         */
        public static function error($exception)
        {
            $code = $exception->getCode() ?? '500';
            $message = $exception->getMessage();

            if ($exception instanceof \Custom\Medoo\Exception) {
                $message = 'Database server error.';
            }

            include CUSTOM_ROOT_PATH . 'includes/Views/exception.php';
            exit;
        }
    }
}
