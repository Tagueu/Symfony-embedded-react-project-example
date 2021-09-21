<?php

namespace App\Entity;

use App\Repository\JurisprudenceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="jurisprudence")
 * @ORM\Entity(repositoryClass=JurisprudenceRepository::class)
 */
class Jurisprudence
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
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $parties;

    /**
     * @ORM\Column(name="magistrats",type="text")
     */
    private $judges;

    /**
     * @ORM\Column(name="avocats",type="text")
     */
    private $lawyers;

    /**
     * @ORM\Column(name="references",type="string", length=255, nullable=true)
     */
    private $jReferences;

    /**
     * @ORM\Column(name="disponible",type="boolean", nullable=true)
     */
    private $available;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $abstract;

    /**
     * @ORM\Column(name="observations",type="text", nullable=true)
     */
    private $observation;

    /**
     * @ORM\Column(name="lien", type="string", length=255, nullable=true)
     */
    private $attachment;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getParties(): ?string
    {
        return $this->parties;
    }

    public function setParties(string $parties): self
    {
        $this->parties = $parties;

        return $this;
    }

    public function getJudges(): ?string
    {
        return $this->judges;
    }

    public function setJudges(string $judges): self
    {
        $this->judges = $judges;

        return $this;
    }

    public function getLawyers(): ?string
    {
        return $this->lawyers;
    }

    public function setLawyers(string $lawyers): self
    {
        $this->lawyers = $lawyers;

        return $this;
    }

    public function getJReferences(): ?string
    {
        return $this->jReferences;
    }

    public function setJReferences(?string $jReferences): self
    {
        $this->jReferences = $jReferences;

        return $this;
    }

    public function getAvailable(): ?bool
    {
        return $this->available;
    }

    public function setAvailable(?bool $available): self
    {
        $this->available = $available;

        return $this;
    }

    public function getAbstract(): ?string
    {
        return $this->abstract;
    }

    public function setAbstract(?string $abstract): self
    {
        $this->abstract = $abstract;

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

    public function getAttachment(): ?string
    {
        return $this->attachment;
    }

    public function setAttachment(?string $attachment): self
    {
        $this->attachment = $attachment;

        return $this;
    }
}
