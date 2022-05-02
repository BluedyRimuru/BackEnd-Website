<?php

namespace Quizz\Model;

use Quizz\Entity\Questionnaire;
use Quizz\Service\bddService;

class questionnaireModel
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = bddService::getConnect();
    }

    public function getFetchAll()
    {
        $requete = $this->bdd->prepare("SELECT * FROM questionnaire");
        $requete->execute();
        $tabQuestionnaire = [];

        foreach ($requete->fetchAll() as $value) {
            $questionnaire = new Questionnaire();
            $questionnaire->setIdQuestionnaire($value["idQuestionnaire"]);
            $questionnaire->setLibelleQuestionnaire($value["libelleQuestionnaire"]);
            $tabQuestionnaire[] = $questionnaire;
        }

        return $tabQuestionnaire;
    }

    public function getFechId(int $id)
    {
        $requete = $this->bdd->prepare("SELECT * FROM questionnaire WHERE idQuestionnaire =".$id);
        $requete->execute();
        $result = $requete->fetch();

        $questionnaire = new Questionnaire();
        $questionnaire->setIdQuestionnaire($result["idQuestionnaire"]);
        $questionnaire->setLibelleQuestionnaire($result["libelleQuestionnaire"]);

        return $questionnaire;
    }
}