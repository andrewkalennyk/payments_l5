<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5d47f813303f881a2d4029e7a29b75aa
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Vis\\Payments\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Vis\\Payments\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Vis\\Payments\\Controllers\\PaymentController' => __DIR__ . '/../..' . '/src/Http/Controllers/PaymentController.php',
        'Vis\\Payments\\PaymasterPayment' => __DIR__ . '/../..' . '/src/Models/PaymasterPayment.php',
        'Vis\\Payments\\Payments' => __DIR__ . '/../..' . '/src/Models/Payments.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5d47f813303f881a2d4029e7a29b75aa::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5d47f813303f881a2d4029e7a29b75aa::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5d47f813303f881a2d4029e7a29b75aa::$classMap;

        }, null, ClassLoader::class);
    }
}