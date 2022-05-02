<?php

namespace Quizz\Controller;

use Quizz\Service\CreateAdmin;
use Quizz\Service\TwigCore;

class CreateAdminController implements ControllerInterface
{

    public function getOutput()
    {
        CreateAdmin::getCreateAdmin();
    }

    public function setInput($get, $post, $vars)
    {
        // TODO: Implement setInput() method.
    }
}