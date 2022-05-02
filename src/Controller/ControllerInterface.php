<?php

namespace Quizz\Controller;

interface ControllerInterface
{
    public function getOutput();
    public function setInput($get, $post, $vars);
}