<?php

namespace Quizz\Controller;

use Quizz\Service\TwigCore;

class GestionQuestionnaireController implements ControllerInterface
{
    public array $flashOptions = [
        "success" => ["type" => "success", "message" => "création du questionnaire réussie !"],
        "idFalse" => ["type" => "error", "message" => "l'id n'est pas un nombre !"],
        "already" => ["type" => "error", "message" => "existe déjà !"],
    ];

    public function getOutput() {

        $twig = TwigCore::getEnvironment();

        if(!isset($_SESSION['login'])){
            header('Location:/');
            die();
        }

        $resultModif = null;

        if (isset($_GET["ques_err"])) {
            $err = htmlspecialchars($_GET['ques_err']);
            if (array_key_exists($err, $this->flashOptions)){
                $resultModif = $this->flashOptions[$err];
            }
        }

        echo $twig->render('gestion-questionnaire.html.twig', [
            'result' => $resultModif
        ]);

    }

    public function setInput($get, $post, $vars)
    {
        // TODO: Implement setInput() method.
    }
}