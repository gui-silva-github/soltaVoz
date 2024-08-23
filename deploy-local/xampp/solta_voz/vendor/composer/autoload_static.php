<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc740a5d87c5ce2f47d06b6e2149169fc
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'SV\\' => 3,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'SV\\' => 
        array (
            0 => __DIR__ . '/..' . '/SV',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc740a5d87c5ce2f47d06b6e2149169fc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc740a5d87c5ce2f47d06b6e2149169fc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc740a5d87c5ce2f47d06b6e2149169fc::$classMap;

        }, null, ClassLoader::class);
    }
}
