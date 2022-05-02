<?php

namespace Quizz\Controller;

use Quizz\Service\CreateQuestionnaire;

class CreateQuestionnaireController implements ControllerInterface
{

    public function getOutput()
    {
        CreateQuestionnaire::getCreateQuestionnaire();
    }

    public function setInput($get, $post, $vars)
    {
        // TODO: Implement setInput() method.
    }
}