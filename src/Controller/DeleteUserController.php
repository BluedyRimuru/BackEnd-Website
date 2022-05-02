<?php

namespace Quizz\Controller;

use Quizz\Service\DeleteUser;
use Quizz\Service\TwigCore;

class DeleteUserController implements ControllerInterface
{

    public function getOutput()
    {
        DeleteUser::getDeleteUser();
    }

    public function setInput($get, $post, $vars)
    {
        // TODO: Implement setInput() method.
    }
}