<?php

namespace App\Model;

class Game
{
    private ?int $id = null;
    private string $gameMode;
    private string $status;
    private int $mjId;
    private \DateTime $creationDate;

    public function __construct(string $gameMode, string $status, int $mjId, string $creationDate, ?int $id = null)
    {
        $this->id = $id;
        $this->gameMode = $gameMode;
        $this->status = $status;
        $this->mjId = $mjId;
        $this->creationDate = new \DateTime($creationDate);
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }


    public function getgameMode(): string
    {
        return $this->gameMode;
    }

    public function setgameMode(string $gameMode): void
    {
        $this->gameMode = $gameMode;
    }


    public function getstatus(): string
    {
        return $this->status;
    }

    public function setstatus(string $status): void
    {
        $this->status = $status;
    }


    public function getMjId(): int
    {
        return $this->mjId;
    }

    public function setMjId(int $mjId): void
    {
        $this->mjId = $mjId;
    }


    public function getcreationDate(): \DateTime
    {
        return $this->creationDate;
    }

    public function setcreationDate(string $creationDate): void
    {
        $this->creationDate = new \DateTime($creationDate);
    }
}
