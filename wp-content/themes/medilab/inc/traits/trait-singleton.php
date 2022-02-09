<?php

namespace MEDILAB_THEME\Inc\Traits;

trait Singleton
{
    public function __construct()
    {

    }

    public function __clone()
    {

    }

    final public static function get_instance()
    {
        static $instances = [];

        $called_class = get_called_class();

        if (!isset($instances[$called_class])) {
            $instances[$called_class] = new $called_class();

            do_action(sprintf('medilab_theme_singleton_init%s', $called_class));
        }
        return $instances[$called_class];
    }
}