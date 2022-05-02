<?php

namespace Quizz\Model;

use Quizz\Entity\Reponse;
use Quizz\Service\bddService;

class reponseModel
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = bddService::getConnect();
    }

    public function getFetchAllReponse()
    {
        $requete = $this->bdd->prepare("SELECT * FROM reponse");
        $requete->execute();
        $tabReponse = [];

        foreach ($requete->fetchAll() as $value) {
            $reponse = new Reponse();
            $reponse->setIdReponse($value["idReponse"]);
            $reponse->setValeur($value["valeur"]);
            $reponse->setCheminImage($value["cheminImage"]);
            $tabReponse[] = $reponse;
        }

        return $tabReponse;
    }

    public function getFechIdReponse(int $id)
    {
        $requete = $this->bdd->prepare("SELECT * FROM reponse WHERE idReponse =".$id);
        $requete->execute();
        $result = $requete->fetch();

        $reponse = new Reponse();
        $reponse->setIdReponse($result["idReponse"]);
        $reponse->setValeur($result["valeur"]);
        $reponse->setCheminImage($result["cheminImage"]);

        return $reponse;
    }
}