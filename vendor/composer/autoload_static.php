<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb2697656a70e840f41c51f94c672d010
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'App\\' => 4,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' =>
        array (
            0 => __DIR__ . '/../..',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb2697656a70e840f41c51f94c672d010::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb2697656a70e840f41c51f94c672d010::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
