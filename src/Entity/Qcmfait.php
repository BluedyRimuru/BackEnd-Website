<?php

namespace Quizz\Entity;

class Qcmfait
{
    private $idEtudiant = 0;
    private $idQuestionnaire = 0;
    private $dateFait = "";
    private $point = 0;

    /**
     * @return int
     */
    public function getIdEtudiant(): int
    {
        return $this->idEtudiant;
    }

    /**
     * @param int $idEtudiant
     */
    public function setIdEtudiant(int $idEtudiant): void
    {
        $this->idEtudiant = $idEtudiant;
    }

    /**
     * @return int
     */
    public function getIdQuestionnaire(): int
    {
        return $this->idQuestionnaire;
    }

    /**
     * @param int $idQuestionnaire
     */
    public function setIdQuestionnaire(int $idQuestionnaire): void
    {
        $this->idQuestionnaire = $idQuestionnaire;
    }

    /**
     * @return string
     */
    public function getDateFait(): string
    {
        return $this->dateFait;
    }

    /**
     * @param string $dateFait
     */
    public function setDateFait(string $dateFait): void
    {
        $this->dateFait = $dateFait;
    }

    /**
     * @return int
     */
    public function getPoint(): int
    {
        return $this->point;
    }

    /**
     * @param int $point
     */
    public function setPoint(int $point): void
    {
        $this->point = $point;
    }


}