<?php

namespace Quizz\Model;

use Quizz\Entity\Question;
use Quizz\Service\bddService;

class questionModel
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = bddService::getConnect();
    }

    public function getFetchAllQuestion()
    {
        $requete = $this->bdd->prepare("SELECT * FROM question");
        $requete->execute();
        $tabQuestion = [];

        foreach ($requete->fetchAll() as $value) {
            $question = new Question();
            $question->setIdQuestion($value["idQuestion"]);
            $question->setLibelleQuestion($value["libelleQuestion"]);
            $question->setType($value["type"]);
            $question->setNbReponse($value["nbReponse"]);
            $question->setNbBonneReponse($value["nbBonneReponse"]);
            $tabQuestion[] = $question;
        }

        return $tabQuestion;
    }

    public function getFechIdQuestion(int $id)
    {
        $requete = $this->bdd->prepare("SELECT * FROM question WHERE idQuestion =".$id);
        $requete->execute();
        $result = $requete->fetch();

        $question = new Question();
        $question->setIdQuestion($result["idQuestion"]);
        $question->setLibelleQuestion($result["libelleQuestion"]);
        $question->setType($result["type"]);
        $question->setNbReponse($result["nbReponse"]);
        $question->setNbBonneReponse($result["nbBonneReponse"]);

        return $question;
    }
}