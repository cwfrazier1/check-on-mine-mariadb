<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit54ba9d4128dbae59123af3d91df186f7
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/src/Twilio',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit54ba9d4128dbae59123af3d91df186f7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit54ba9d4128dbae59123af3d91df186f7::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
