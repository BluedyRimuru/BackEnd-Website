<?php

namespace Quizz\Controller;

use Quizz\Service\Connexion;
use Quizz\Service\TwigCore;

class HomeController implements ControllerInterface
{

    public array $flashOption = [
        "password" => "mot de passe incorrect",
        "email" => "email incorrect",
        "already" => "compte non existant Contactez un administrateur si vous pensez qu'il s'agit d'une erreur",
    ];

    public function getOutput()
    {
        $twig = TwigCore::getEnvironment();

        if(isset($_SESSION['login'])){
        header('Location:admin');
        die();
        }

        $result = null;

        if (isset($_GET["login_err"])) {
            $err = htmlspecialchars($_GET['login_err']);
            if (in_array($err, array_keys($this->flashOption))) {
                $result = $this->flashOption[$err];
            }
        }

        echo $twig->render('section-index.html.twig', [
            'result' => $result
        ]);
    }

    public function setInput($get, $post, $vars)
    {
        // TODO: Implement setInput() method.
    }
}