<?php

namespace Quizz\Controller;

use Quizz\Service\TwigCore;

class GestionAdministrateurController implements ControllerInterface
{

    public array $flashOptions = [
        "success" => ["type" => "success", "message" => "modification réussie !"],
        "password" => ["type" => "error", "message" => "mot de passe différent"],
        "email" => ["type" => "error", "message" => "email non valide"],
        "email_length" => ["type" => "error", "message" => "email trop long"],
        "pseudo_length" => ["type" => "error", "message" => "pseudo trop long"],
        "already" => ["type" => "error", "message" => "compte déjà existant"],
    ];

    public function getOutput() {

        $twig = TwigCore::getEnvironment();

        if(!isset($_SESSION['login'])){
            header('Location:/');
            die();
        }

        $resultModif = null;

        if (isset($_GET["reg_err"])) {
            $err = htmlspecialchars($_GET['reg_err']);
            if (array_key_exists($err, $this->flashOptions)){
                $resultModif = $this->flashOptions[$err];
            }
        }

        echo $twig->render('gestion-admin.html.twig', [
            'result' => $resultModif
        ]);

    }

    public function setInput($get, $post, $vars)
    {
        // TODO: Implement setInput() method.
    }
}