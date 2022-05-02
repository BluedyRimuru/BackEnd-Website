<?php

namespace Quizz\Service;

class Deconnexion
{
    public static function getDeconnexion() {
        session_start();
        session_destroy();
        header('Location:/');
        die();
    }
}