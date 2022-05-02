<?php

namespace Quizz\Controller;

class UserController implements ControllerInterface
{

    public function getOutput()
    {

    }

    public function setInput($get, $post, $vars)
    {
        var_dump($vars["id"]);
    }
}