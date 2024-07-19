<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit05443b687effb8e835f8c54cfe38c096
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

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit05443b687effb8e835f8c54cfe38c096::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit05443b687effb8e835f8c54cfe38c096::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit05443b687effb8e835f8c54cfe38c096::$classMap;

        }, null, ClassLoader::class);
    }
}
