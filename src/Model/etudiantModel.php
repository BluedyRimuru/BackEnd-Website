<?php

namespace Quizz\Model;

use Quizz\Entity\Etudiant;
use Quizz\Service\bddService;

class etudiantModel
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = bddService::getConnect();
    }

    public function getFetchAllEtudiant()
    {
        $requete = $this->bdd->prepare("SELECT * FROM etudiants");
        $requete->execute();
        $tabEtudiant = [];

        foreach ($requete->fetchAll() as $value) {
            $etudiant = new Etudiant();
            $etudiant->setIdEtudiant($value["idEtudiant"]);
            $etudiant->setLogin($value["login"]);
            $etudiant->setMotDePasse($value["motDePasse"]);
            $etudiant->setNom($value["nom"]);
            $etudiant->setPrenom($value["prenom"]);
            $etudiant->setEmail($value["email"]);
            $tabEtudiant[] = $etudiant;
        }

        return $tabEtudiant;
    }

    public function getFechIdEtudiant(int $id)
    {
        $requete = $this->bdd->prepare("SELECT * FROM etudiants WHERE idEtudiant =".$id);
        $requete->execute();
        $result = $requete->fetch();

        $etudiant = new Etudiant();
        $etudiant->setIdEtudiant($result["idEtudiant"]);
        $etudiant->setLogin($result["login"]);
        $etudiant->setMotDePasse($result["motDePasse"]);
        $etudiant->setNom($result["nom"]);
        $etudiant->setPrenom($result["prenom"]);
        $etudiant->setEmail($result["email"]);

        return $etudiant;
    }
}