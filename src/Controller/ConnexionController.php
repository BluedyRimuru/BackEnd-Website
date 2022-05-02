<?php

namespace Quizz\Controller;

use Quizz\Service\bddService;
use Quizz\Service\Connexion;

class ConnexionController implements ControllerInterface
{
    public function getOutput()
    {
        Connexion::getConnexion();
    }

        public function setInput($get, $post, $vars)
    {
        // TODO: Implement setInput() method.
    }

}

