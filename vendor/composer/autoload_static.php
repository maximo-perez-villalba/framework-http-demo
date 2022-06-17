<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit923da1230488562c1382f3ee3f3e896f
{
    public static $prefixLengthsPsr4 = array (
        'f' => 
        array (
            'framework\\' => 10,
        ),
        'd' => 
        array (
            'demo\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'framework\\' => 
        array (
            0 => __DIR__ . '/..' . '/maximo-perez-villalba/framework-environment/src/framework',
            1 => __DIR__ . '/..' . '/maximo-perez-villalba/framework-http/src/framework',
        ),
        'demo\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/demo',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit923da1230488562c1382f3ee3f3e896f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit923da1230488562c1382f3ee3f3e896f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit923da1230488562c1382f3ee3f3e896f::$classMap;

        }, null, ClassLoader::class);
    }
}
