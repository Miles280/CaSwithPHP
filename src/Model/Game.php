<?php

namespace App\Model;

class Game
{
    private ?int $id = null;
    private string $modeJeu;
    private string $statut;
    private int $mjId;
    private \DateTime $dateCreation;

    public function __construct(string $mode_jeu, string $statut, int $mj_id, string $dateCreation, ?int $id = null)
    {
        $this->id = $id;
        $this->modeJeu = $mode_jeu;
        $this->statut = $statut;
        $this->mjId = $mj_id;
        $this->dateCreation = new \DateTime($dateCreation);
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }


    function getModejeu(): string
    {
        return $this->modeJeu;
    }

    function setModejeu($modejeu): void
    {
        $this->modeJeu = $modejeu;
    }


    function getStatut(): string
    {
        return $this->statut;
    }

    function setStatut($statut): void
    {
        $this->statut = $statut;
    }


    function getMjid(): int
    {
        return $this->mjId;
    }

    function setMjid($mjid): void
    {
        $this->mjId = $mjid;
    }


    public function getDateCreation(): \DateTime
    {
        return $this->dateCreation;
    }

    public function setDateCreation($dateCreation): void
    {
        $this->dateCreation = new \DateTime($dateCreation);
    }
}
