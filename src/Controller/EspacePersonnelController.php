<?php

namespace Quizz\Controller;

use Quizz\Service\bddService;
use Quizz\Service\TwigCore;

class EspacePersonnelController implements ControllerInterface
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = bddService::getConnect();
    }

    public array $flashOptions = [
        "success" => ["type" => "success", "message" => "modification réussie !"],
        "password" => ["type" => "error", "message" => "mot de passe différent"],
        "email" => ["type" => "error", "message" => "email non valide"],
        "email_length" => ["type" => "error", "message" => "email trop long"],
        "pseudo_length" => ["type" => "error", "message" => "pseudo trop long"],
        "already" => ["type" => "error", "message" => "veuillez utiliser normalement le système :)"],
    ];

    public function getOutput() {

        $twig = TwigCore::getEnvironment();

        if (!isset($_SESSION['login'])) {
            header('Location:/');
            die();
        }

        $req = $this->bdd->prepare('SELECT * FROM admin WHERE token = ?');
        $req->execute(array($_SESSION['login']));
        $data = $req->fetch();

        $login = $data['login'];
        $email = $data ['email'];
        $prenom = $data ['prenom'];
        $nom = $data ['nom'];

        $resultModif = null;

        if (isset($_GET["modif_err"])) {
            $err = htmlspecialchars($_GET['modif_err']);
            if (array_key_exists($err, $this->flashOptions)){
                $resultModif = $this->flashOptions[$err];
            }
        }

        echo $twig->render('espace-personnel.html.twig', [
            'result' => $resultModif,
            'login' => $login,
            'email' => $email,
            'prenom' => $prenom,
            'nom' => $nom
        ]);

    }

    public function setInput($get, $post, $vars)
    {
        // TODO: Implement setInput() method.
    }
}