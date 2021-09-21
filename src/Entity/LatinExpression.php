<?php

namespace App\Entity;

use App\Repository\LatinExpressionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="expressionsLatines")
 * @ORM\Entity(repositoryClass=LatinExpressionRepository::class)
 */
class LatinExpression
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Theme",
     * cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $theme;

    /**
     * @ORM\Column(name="origine",type="string", length=255)
     */
    private $origin;

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

    public function getOrigin(): ?string
    {
        return $this->origin;
    }

    public function setOrigin(string $origin): self
    {
        $this->origin = $origin;

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
