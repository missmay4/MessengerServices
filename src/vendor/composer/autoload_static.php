<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite71c55fb16c0455298f76b6446cff05f
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite71c55fb16c0455298f76b6446cff05f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite71c55fb16c0455298f76b6446cff05f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
