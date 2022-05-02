<?php

namespace Quizz\Entity;

class Question
{
    private $idQuestion;
    private $libelleQuestion;
    private $type = 0;
    private $nbReponse = 0;
    private $nbBonneReponse = 0;

    /**
     * @return mixed
     */
    public function getIdQuestion()
    {
        return $this->idQuestion;
    }

    /**
     * @param mixed $idQuestion
     */
    public function setIdQuestion($idQuestion): void
    {
        $this->idQuestion = $idQuestion;
    }

    /**
     * @return mixed
     */
    public function getLibelleQuestion()
    {
        return $this->libelleQuestion;
    }

    /**
     * @param mixed $libelleQuestion
     */
    public function setLibelleQuestion($libelleQuestion): void
    {
        $this->libelleQuestion = $libelleQuestion;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType(int $type): void
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getNbReponse(): int
    {
        return $this->nbReponse;
    }

    /**
     * @param int $nbReponse
     */
    public function setNbReponse(int $nbReponse): void
    {
        $this->nbReponse = $nbReponse;
    }

    /**
     * @return int
     */
    public function getNbBonneReponse(): int
    {
        return $this->nbBonneReponse;
    }

    /**
     * @param int $nbBonneReponse
     */
    public function setNbBonneReponse(int $nbBonneReponse): void
    {
        $this->nbBonneReponse = $nbBonneReponse;
    }


}