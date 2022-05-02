<?php

namespace Quizz\Controller;

use Quizz\DebugHandler;
use Quizz\Model\questionnaireModel;
use Quizz\Service\TwigCore;

class QuestionController implements ControllerInterface
{

    public function getOutput() {

        echo "Heyyy salut les amis on se retrouve pour une nouvelle vidéo en compagnie de Miss Jirachi" . "<br>";
        echo "Coucouu";

        $twig = TwigCore::getEnvironment();
        // Obj connect Mysql -> Obj Questionnaire
        $questionnaireModel = new questionnaireModel();

        // je teste la variable GET /?id
        if (isset($_GET["id"])) {
            echo $twig->render('resultat.html.twig', [
                'result' => $questionnaireModel->getFechId((int) $_GET["id"])
            ]);
        }
    }

    public function setInput($get, $post, $vars)
    {
        if (isset($get["id"])) {
            echo "ID=" . $get["id"] . "<br>";
        }
    }
}