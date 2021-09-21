<?php

namespace App\Entity;

use App\Repository\DocumentarySourceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="soucesDocumentaires")
 * @ORM\Entity(repositoryClass=DocumentarySourceRepository::class)
 */
class DocumentarySource
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
     * @ORM\Column(name="references",type="string", length=255)
     */
    private $dReferences;

    /**
     * @ORM\Column(name="origin",type="string", length=255)
     */
    private $origin;

    /**
     * @ORM\Column(name="disponible",type="boolean")
     */
    private $available;

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

    public function getDReferences(): ?string
    {
        return $this->dReferences;
    }

    public function setDReferences(string $dReferences): self
    {
        $this->dReferences = $dReferences;

        return $this;
    }


    public function getAvailable(): ?bool
    {
        return $this->available;
    }

    public function setAvailable(bool $available): self
    {
        $this->available = $available;

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

    public function getOrigin(): ?string
    {
        return $this->origin;
    }

    public function setOrigin(string $origin): self
    {
        $this->origin = $origin;

        return $this;
    }
}
