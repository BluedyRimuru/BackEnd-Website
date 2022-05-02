<?php

namespace Quizz\Controller;

use Quizz\Model\etudiantModel;
use Quizz\Service\TwigCore;

class GestionUtilisateurController implements ControllerInterface
{
    public array $flashOptions = [
        "success" => ["type" => "success", "message" => "La suppression a été réussie"],
        "error" => ["type" => "error", "message" => "La suppression a échouée"],
    ];

    public function getOutput() {

        $twig = TwigCore::getEnvironment();

        if(!isset($_SESSION['login'])){
            header('Location:/');
            die();
        }

        $resultSuppression = null;

        if (isset($_GET["delete_err"])) {
            $err = htmlspecialchars($_GET['delete_err']);
            if (array_key_exists($err, $this->flashOptions)){
                $resultSuppression = $this->flashOptions[$err];
            }
        }

        $etudiant = new etudiantModel();
        $resultAllEtudiant = $etudiant->getFetchAllEtudiant();

        echo $twig->render('gestion-utilisateur.html.twig', [
            'result' => $resultSuppression,
            'resultEtudiants' => $resultAllEtudiant,
            'etudiant' => $etudiant
        ]);

    }

    public function setInput($get, $post, $vars)
    {
        // TODO: Implement setInput() method.
    }
}