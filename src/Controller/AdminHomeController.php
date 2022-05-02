<?php

namespace Quizz\Controller;

use Quizz\Service\bddService;
use Quizz\Service\TwigCore;

class AdminHomeController implements ControllerInterface
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = bddService::getConnect();
    }

    public function getOutput() {

        $twig = TwigCore::getEnvironment();

        if(!isset($_SESSION['login'])){
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

        echo $twig->render('admin-home.html.twig', [
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