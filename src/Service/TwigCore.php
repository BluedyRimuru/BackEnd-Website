<?php

namespace Quizz\Service;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigCore
{
    private static $twig;

    public static function getEnvironment(): Environment
    {
        if (!self::$twig) {

        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . "/../../templates");

        self::$twig = new \Twig\Environment($loader, [
            //'cache' => '/path/to/compilation_cache',
        ]);
        }
        return self::$twig;
    }
}