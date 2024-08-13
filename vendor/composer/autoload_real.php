<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitc740a5d87c5ce2f47d06b6e2149169fc
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitc740a5d87c5ce2f47d06b6e2149169fc', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitc740a5d87c5ce2f47d06b6e2149169fc', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitc740a5d87c5ce2f47d06b6e2149169fc::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
