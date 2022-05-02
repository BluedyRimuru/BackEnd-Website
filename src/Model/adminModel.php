<?php

namespace Quizz\Model;

use Quizz\Entity\Admin;
use Quizz\Service\bddService;

class adminModel
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = bddService::getConnect();
    }

    public function getFetchAllAdmin()
    {
        $requete = $this->bdd->prepare("SELECT * FROM admin");
        $requete->execute();
        $tabAdmin = [];

        foreach ($requete->fetchAll() as $value) {
            $admin = new Admin();
            $admin->setIdEtudiant($value["idAdmin"]);
            $admin->setLogin($value["login"]);
            $admin->setMotDePasse($value["password"]);
            $admin->setNom($value["nom"]);
            $admin->setPrenom($value["prenom"]);
            $admin->setEmail($value["email"]);
            $admin->setToken($value["token"]);
            $tabAdmin[] = $admin;
        }

        return $tabAdmin;
    }

    public function getFechIdAdmin(int $id)
    {
        $requete = $this->bdd->prepare("SELECT * FROM admin WHERE idAdmin =".$id);
        $requete->execute();
        $result = $requete->fetch();

        $admin = new Admin();
        $admin->setIdAdmin($result["idAdmin"]);
        $admin->setLogin($result["login"]);
        $admin->setPassword($result["password"]);
        $admin->setNom($result["nom"]);
        $admin->setPrenom($result["prenom"]);
        $admin->setEmail($result["email"]);
        $admin->setToken($result["token"]);

        return $admin;
    }
}