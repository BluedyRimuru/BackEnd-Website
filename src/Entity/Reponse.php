<?php

namespace Quizz\Entity;

class Reponse
{
    private $idReponse = 0;
    private $valeur = "";
    private $cheminImage = "";

    /**
     * @return int
     */
    public function getIdReponse(): int
    {
        return $this->idReponse;
    }

    /**
     * @param int $idReponse
     */
    public function setIdReponse(int $idReponse): void
    {
        $this->idReponse = $idReponse;
    }

    /**
     * @return string
     */
    public function getValeur(): string
    {
        return $this->valeur;
    }

    /**
     * @param string $valeur
     */
    public function setValeur(string $valeur): void
    {
        $this->valeur = $valeur;
    }

    /**
     * @return string
     */
    public function getCheminImage(): string
    {
        return $this->cheminImage;
    }

    /**
     * @param string $cheminImage
     */
    public function setCheminImage(string $cheminImage): void
    {
        $this->cheminImage = $cheminImage;
    }


}