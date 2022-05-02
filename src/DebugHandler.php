<?php

namespace Quizz;

class DebugHandler
{
    public static function dump($input)
    {
        echo "<pre>";
        var_dump($input);
        echo "</pre>";
    }

}

