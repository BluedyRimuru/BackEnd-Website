<?php

namespace Quizz\Model;

use Quizz\Entity\Qcmfait;
use Quizz\Service\bddService;

class qcmfaitModel
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = bddService::getConnect();
    }

    public function getFetchAllQcmfait()
    {
        $requete = $this->bdd->prepare("SELECT * FROM qcmfait");
        $requete->execute();
        $tabQcmfait = [];

        foreach ($requete->fetchAll() as $value) {
            $qcmfait = new Qcmfait();
            $qcmfait->setIdQuestionnaire($value["idQuestionnaire"]);
            $qcmfait->setIdEtudiant($value["idEtudiant"]);
            $qcmfait->setDateFait($value["dateFait"]);
            $qcmfait->setPoint($value["point"]);
            $tabQcmfait[] = $qcmfait;
        }

        return $tabQcmfait;
    }

    public function getFechIdQcmfait(int $id)
    {
        $requete = $this->bdd->prepare("SELECT * FROM qcmfait WHERE idQuestionnaire =".$id);
        $requete->execute();
        $result = $requete->fetch();

        $qcmfait = new Qcmfait();
        $qcmfait->setIdQuestionnaire($result["idQuestionnaire"]);
        $qcmfait->setIdEtudiant($result["idEtudiant"]);
        $qcmfait->setDateFait($result["dateFait"]);
        $qcmfait->setPoint($result["point"]);

        return $qcmfait;
    }
}