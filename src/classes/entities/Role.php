<?php
require_once("classes/DatabaseManager.php");


class Role
{

    private ?int $id = null;
    private string $name;
    private string $camp;
    private string $description;

    public function __construct(string $name, string $camp, string $description, ?int $id = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->camp = $camp;
        $this->description = $description;
    }



    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }


    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }


    public function getCamp(): string
    {
        return $this->camp;
    }

    public function setCamp($camp): void
    {
        $this->camp = $camp;
    }


    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }
}
