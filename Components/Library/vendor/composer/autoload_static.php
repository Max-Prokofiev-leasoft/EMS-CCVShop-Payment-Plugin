<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit70efba29ab2e9db57712a235b2a1a046
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Ginger\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Ginger\\' => 
        array (
            0 => __DIR__ . '/..' . '/gingerpayments/ginger-php/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit70efba29ab2e9db57712a235b2a1a046::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit70efba29ab2e9db57712a235b2a1a046::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit70efba29ab2e9db57712a235b2a1a046::$classMap;

        }, null, ClassLoader::class);
    }
}