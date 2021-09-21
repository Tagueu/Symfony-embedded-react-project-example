<?php

namespace App\Entity;

use App\Repository\ThemeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="themes")
 * @ORM\Entity(repositoryClass=ThemeRepository::class)
 */
class Theme
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="libelle", type="string", length=190,unique=true)
     */
    private $title;

    /**
     * @ORM\Column(name="voir", type="text", nullable=true)
     */
    private $view;

    /**
     * @ORM\Column(name="voirAussi", type="text", nullable=true)
     */
    private $seeAlso;

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

    public function getView(): ?string
    {
        return $this->view;
    }

    public function setView(?string $view): self
    {
        $this->view = $view;

        return $this;
    }

    public function getSeeAlso(): ?string
    {
        return $this->seeAlso;
    }

    public function setSeeAlso(?string $seeAlso): self
    {
        $this->seeAlso = $seeAlso;

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
