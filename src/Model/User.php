<?php

namespace App\Model;

class User
{
    private ?int $id = null;
    private string $username;
    private string $password;
    private bool $isMJ;
    private \DateTime $inscriptionDate;

    public function __construct(string $username, string $password, bool $isMJ, string $inscriptionDate, ?int $id = null)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->isMJ = $isMJ;
        $this->inscriptionDate = new \DateTime($inscriptionDate);
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }


    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }


    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }


    public function getIsMJ(): bool
    {
        return $this->isMJ;
    }

    public function setIsMJ(bool $isMJ): void
    {
        $this->isMJ = $isMJ;
    }


    public function getInscriptionDate(): \DateTime
    {
        return $this->inscriptionDate;
    }

    public function setInscriptionDate(string $inscriptionDate): void
    {
        $this->inscriptionDate = new \DateTime($inscriptionDate);
    }
}
