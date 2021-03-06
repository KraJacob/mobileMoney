<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6f376e76397c3c78fd4c1a0e841bf9d2
{
    public static $files = array (
        '029bffbd721800038bcfaf4916fa491c' => __DIR__ . '/..' . '/mtownsend/xml-to-array/src/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Mtownsend\\XmlToArray\\' => 21,
        ),
        'A' => 
        array (
            'Arolitec\\Mobilemoney\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Mtownsend\\XmlToArray\\' => 
        array (
            0 => __DIR__ . '/..' . '/mtownsend/xml-to-array/src',
        ),
        'Arolitec\\Mobilemoney\\' => 
        array (
            0 => __DIR__ . '/../..' . '/packages/Arolitec/Mobilemoney/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6f376e76397c3c78fd4c1a0e841bf9d2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6f376e76397c3c78fd4c1a0e841bf9d2::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
