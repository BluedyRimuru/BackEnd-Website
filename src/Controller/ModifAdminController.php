<?php

namespace Quizz\Controller;

use Quizz\Service\ModifAdmin;
use Quizz\Service\TwigCore;

class ModifAdminController implements ControllerInterface
{
    public function getOutput()
    {
         ModifAdmin::getModifAdmin();
    }

    public function setInput($get, $post, $vars)
    {
        // TODO: Implement setInput() method.
    }
}