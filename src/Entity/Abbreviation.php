<?php

namespace App\Entity;

use App\Repository\AbbreviationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="abreviations")
 * @ORM\Entity(repositoryClass=AbbreviationRepository::class)
 */
class Abbreviation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="libelle",type="string", length=190, unique=true)
     */
    private $title;

    /**
     * @ORM\Column(name="signification",type="string", length=255)
     */
    private $meaning;

    /**
     * @ORM\Column(name="observations",type="text", nullable=true)
     */
    private $observation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getMeaning(): ?string
    {
        return $this->meaning;
    }

    public function setMeaning(string $meaning): self
    {
        $this->meaning = $meaning;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(?string $observation): self
    {
        $this->observation = $observation;

        return $this;
    }
}
