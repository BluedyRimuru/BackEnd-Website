<?php

namespace Quizz\Controller;

use Quizz\Service\Deconnexion;

class DeconnexionController implements ControllerInterface
{
    public function getOutput() {

        Deconnexion::getDeconnexion();

    }

    public function setInput($get, $post, $vars)
    {
        // TODO: Implement setInput() method.
    }
}